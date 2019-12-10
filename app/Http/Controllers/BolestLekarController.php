<?php

namespace App\Http\Controllers;

use App\Bolest;
use Illuminate\Http\Request;

class BolestLekarController extends Controller
{
    public function index()
    {
        $bolesti = Bolest::orderBy('sifra_bolesti')->paginate(10);
        return view('lekar.bolesti', compact('bolesti'));
    }

    public function create()
    {
        return view('lekar.dodajBolest');
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

        return redirect('/lekar/bolesti')->withErrors(['poruka' => 'Bolest je uspešno uneta!']);
    }

    public function show(Bolest $bolest)
    {
        //
    }

    public function edit(Bolest $bolest)
    {
        return view('lekar.dodajBolest', compact('bolest'));
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

        return redirect('/lekar/bolesti')->withErrors(['poruka' => 'Podaci o bolesti su uspešno izmenjeni!']);
    }

    public function destroy(Bolest $bolest)
    {
        //
    }

    public function search(){
        $str = htmlspecialchars($_GET['str'] ?? ''); 

        $bolesti = Bolest::where('naziv', 'like', '%' . $str . '%')
            ->orWhere('sifra_bolesti', 'like', '%' . $str . '%')
            ->orderBy('sifra_bolesti')
            ->paginate(10);

        return view('lekar.bolesti', compact('bolesti'));
    }
}
