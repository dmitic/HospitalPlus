<?php

namespace App\Http\Controllers;

use App\Pacijent;
use App\User;
use Illuminate\Http\Request;

class PacijentController extends Controller
{

    public function index()
    {
        $pacijenti = Pacijent::orderBy('created_at', 'desc')->paginate(5);
        return view('sestra.sviPacijenti', compact('pacijenti'));
    }

    public function create()
    {
        $lekari = User::all()->where('uloga_id', '2')->where('active', '1');
        return view('sestra.dodajPacijenta', compact('lekari'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ime' => 'required|max:50',
            'prezime' => 'required|max:100',
            'telefon' => 'required|max:20',
            'adresa' => 'required|max:100',
            'grad' => 'required|max:50',
        ]);

        $pacijent = new Pacijent();
        $pacijent->ime = $request->ime;
        $pacijent->prezime = $request->prezime;
        $pacijent->telefon = $request->telefon;
        $pacijent->adresa = $request->adresa;
        $pacijent->grad = $request->grad;
        $pacijent->datum_rodjenja = $request->datumRodjenja;
        $pacijent->lbo = $request->lbo;
        $pacijent->krvna_grupa = $request->krv;
        $pacijent->pol = $request->pol;
        $pacijent->user_id = $request->iz_lekar;
        $pacijent->save();

        return redirect('/sestra/pacijenti')->withErrors(['poruka' => 'Pacijent je uspešno dodat!']);
    }

    public function edit(Pacijent $pacijent)
    {
        $lekari = User::all()->where('uloga_id', '2')->where('active', '1');
        return view('sestra.dodajPacijenta', compact('pacijent', 'lekari'));
    }

    public function update(Request $request, Pacijent $pacijent)
    {
        $request->validate([
            'ime' => 'required|max:50',
            'prezime' => 'required|max:100',
            'telefon' => 'required|max:20',
            'adresa' => 'required|max:100',
            'grad' => 'required|max:50',
            'lbo' => 'required|max:11',
        ]);

        $pacijent->update([
            'ime' => request()->ime,
            'prezime' => request()->prezime,
            'telefon' => request()->telefon,
            'adresa' => request()->adresa,
            'grad' => request()->grad,
            'datum_rodjenja' => request()->datumRodjenja,
            'lbo' => request()->lbo,
            'krvna_grupa' => request()->krv,
            'pol' => request()->pol,
            'user_id' => request()->iz_lekar,
        ]);

        return redirect('/sestra/pacijenti')->withErrors(['poruka' => 'Pacijent je uspešno izmenjen!']);
    }

    public function destroy(Pacijent $pacijent)
    {
        $pacijent->delete();
        return redirect('/sestra/pacijenti')
                    ->withErrors(['poruka' => 'Pacijent je obrisan!']);
    }

    public function search(){
        $str = htmlspecialchars($_GET['str'] ?? ''); 

        $pacijenti = Pacijent::where('ime', 'like', '%' . $str . '%')
            ->orWhere('prezime', 'like', '%' . $str . '%')
            ->orWhere('lbo', 'like', '%' . $str . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('sestra.sviPacijenti', compact('pacijenti'));
    }
}
