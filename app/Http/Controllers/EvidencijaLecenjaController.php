<?php

namespace App\Http\Controllers;

use App\Evidencija_lecenja;
use Illuminate\Http\Request;
use App\Karton;
use App\Bolest;
use App\Lek;
use Illuminate\Support\Facades\DB;

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
        
        try {
            DB::beginTransaction();
                $request->validate([
                    'opis' => 'required',
                    'kolicina' => 'required',
                ]);
        
                $upis = new Evidencija_lecenja();
                $upis->karton_id = request()->karton_id;
                $upis->datum_posete = date("Y-m-d");
                $upis->user_id = \Auth::user()->id;
                $upis->bolest_id = request()->dijagnoza;
                $upis->opis = request()->opis;
                $upis->lek_id = request()->terapija;
                $upis->kolicina = request()->kolicina;
                $upis->save();

                // update količine u tabeli lekovi
                $kolicina = Lek::where('id', request()->terapija)->first();
                if (request()->kolicina > $kolicina->kolicina)
                    return redirect()->back()->withInput()->withErrors(['kolicina' => 'Prepisana količina ne može biti veća od trenutne količine na stanju!', 'terapija' => request()->terapija, 'dijagnoza' => request()->dijagnoza]);
                else
                    $kolicina->update(['kolicina' => $kolicina->kolicina - request()->kolicina]);

            DB::commit();
                return redirect('/lekar/prikazi/'. request()->karton_id)->withErrors(['poruka' => 'Pregled je uspešno snimljen!']);

        } catch (\Exception $e) {
            
            DB::rollback();
                return redirect()->back()->withInput()->withErrors(['poruka' => 'Došlo je do greške, pokušajte ponovo!', 'terapija' => request()->terapija, 'dijagnoza' => request()->dijagnoza]);
        }        
    }
}
