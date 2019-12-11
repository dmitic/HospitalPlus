<?php

namespace App\Http\Controllers;

use App\Evidencija_lecenja;
use Illuminate\Http\Request;
use App\Karton;
use App\Bolest;
use App\Lek;

class EvidencijaLecenjaController extends Controller
{
    public function create(Karton $karton)
    {
        $dijagnoze = Bolest::all();
        $lekovi = Lek::all();
        return view('lekar.dodajPregled', compact('karton', 'dijagnoze', 'lekovi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'opis' => 'required',
        ]);

        $upis = new Evidencija_lecenja();
        $upis->karton_id = request()->karton_id;
        $upis->datum_posete = date("Y-m-d");
        $upis->user_id = \Auth::user()->id;
        $upis->bolest_id = request()->dijagnoza;
        $upis->opis = request()->opis;
        $upis->lek_id = request()->terapija;
        $upis->save();


        return redirect('/lekar/prikazi/'. request()->karton_id)->withErrors(['poruka' => 'Pregled je uspešno snimljen!']);
    }
}
