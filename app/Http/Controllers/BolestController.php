<?php

namespace App\Http\Controllers;

use App\Bolest;
use Illuminate\Http\Request;

class BolestController extends Controller
{
    public function index()
    {
        $bolesti = Bolest::orderBy('sifra_bolesti')->paginate(10);

        if (\Auth::user()->rola->naziv == 'Lekar')
            return view('lekar.bolesti', compact('bolesti'));
        if (\Auth::user()->rola->naziv == 'Sestra')
            return view('sestra.bolesti', compact('bolesti'));
    }

    public function create()
    {
        if (\Auth::user()->rola->naziv == 'Lekar')
            return view('lekar.dodajBolest');
        if (\Auth::user()->rola->naziv == 'Sestra')
            return view('sestra.dodajBolest');
    }

    public function store(Request $request)
    {
        $request->validate([
            'naziv' => 'required|max:100',
            'sifra_bolesti' => 'required|max:10',
        ]);

        $bolest = new Bolest();
        $bolest->naziv = $request->naziv;
        $bolest->sifra_bolesti = $request->sifra_bolesti;
        $bolest->save();

        if (\Auth::user()->rola->naziv == 'Lekar')
            return redirect('/lekar/bolesti')->withErrors(['poruka' => 'Bolest je uspešno uneta!']);
        if (\Auth::user()->rola->naziv == 'Sestra')
            return redirect('/sestra/bolesti')->withErrors(['poruka' => 'Bolest je uspešno uneta!']);
    }

    public function edit(Bolest $bolest)
    {
        if (\Auth::user()->rola->naziv == 'Lekar')
            return view('lekar.dodajBolest', compact('bolest'));
        if (\Auth::user()->rola->naziv == 'Sestra')
            return view('sestra.dodajBolest', compact('bolest'));
    }

    public function update(Request $request, Bolest $bolest)
    {
        $request->validate([
            'naziv' => 'required|max:100',
            'sifra_bolesti' => 'required|max:10',
        ]);

        $bolest->update([
            'naziv' => request()->naziv,
            'sifra_bolesti' => request()->sifra_bolesti,
        ]);

        if (\Auth::user()->rola->naziv == 'Lekar')
            return redirect('/lekar/bolesti')->withErrors(['poruka' => 'Podaci o bolesti su uspešno izmenjeni!']);
        if (\Auth::user()->rola->naziv == 'Sestra')
            return redirect('/sestra/bolesti')->withErrors(['poruka' => 'Podaci o bolesti su uspešno izmenjeni!']);
    }

    public function search(){
        $str = htmlspecialchars($_GET['str'] ?? ''); 

        $bolesti = Bolest::where('naziv', 'like', '%' . $str . '%')
            ->orWhere('sifra_bolesti', 'like', '%' . $str . '%')
            ->orderBy('sifra_bolesti')
            ->paginate(10);

        if (\Auth::user()->rola->naziv == 'Lekar')
            return view('lekar.bolesti', compact('bolesti'));
        if (\Auth::user()->rola->naziv == 'Sestra')
            return view('sestra.bolesti', compact('bolesti'));
    }
}
