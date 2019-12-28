<?php

namespace App\Http\Controllers;

use App\Lek;
use Illuminate\Http\Request;

class LekController extends Controller
{
    public function index()
    {
        $lekovi = Lek::orderBy('naziv')->paginate(5);

        if (\Auth::user()->rola->naziv == 'Lekar')
            return view('lekar.lekovi', compact('lekovi'));
        if (\Auth::user()->rola->naziv == 'Sestra')
            return view('sestra.lekovi', compact('lekovi'));
    }

    public function create()
    {
        if (\Auth::user()->rola->naziv === 'Lekar')
            return view('lekar.dodajLek');
        if (\Auth::user()->rola->naziv === 'Sestra')
            return view('sestra.dodajLek');
    }

    public function store(Request $request)
    {
        $request->validate([
            'naziv' => 'required|max:50',
            'kolicina' => 'required|max:11',
        ]);

        $lek = new Lek();
        $lek->naziv = $request->naziv;
        $lek->kolicina = $request->kolicina;
        $lek->save();

        if (\Auth::user()->rola->naziv === 'Lekar')
            return redirect('/lekar/lekovi')->withErrors(['poruka' => 'Lek je uspešno unet!']);
        if (\Auth::user()->rola->naziv === 'Sestra')
            return redirect('/sestra/lekovi')->withErrors(['poruka' => 'Lek je uspešno unet!']);
    }

    public function edit(Lek $lek)
    {
        if (\Auth::user()->rola->naziv === 'Lekar')
            return view('lekar.dodajLek', compact('lek'));
        if (\Auth::user()->rola->naziv === 'Sestra')
            return view('sestra.dodajLek', compact('lek'));
    }

    public function update(Request $request, Lek $lek)
    {
        $request->validate([
            'naziv' => 'required|max:50',
            'kolicina' => 'required|max:11',
        ]);

        $lek->update([
            'naziv' => request()->naziv,
            'kolicina' => request()->kolicina,
        ]);

        if (\Auth::user()->rola->naziv === 'Lekar')
            return redirect('/lekar/lekovi')->withErrors(['poruka' => 'Podaci o leku su uspešno izmenjeni!']);
        if (\Auth::user()->rola->naziv === 'Sestra')
            return redirect('/sestra/lekovi')->withErrors(['poruka' => 'Podaci o leku su uspešno izmenjeni!']);
    }

    public function destroy(Lek $lek)
    {
        $lek->delete();
        if (\Auth::user()->rola->naziv === 'Lekar')
            return redirect('/lekar/lekovi')->withErrors(['poruka' => 'Lek je obrisan!']);
        if (\Auth::user()->rola->naziv === 'Sestra')
            return redirect('/sestra/lekovi')->withErrors(['poruka' => 'Lek je obrisan!']);
    }

    public function search(){
        $str = htmlspecialchars($_GET['str'] ?? ''); 

        $lekovi = Lek::where('naziv', 'like', '%' . $str . '%')
            ->orderBy('naziv')
            ->paginate(5);

        if (\Auth::user()->rola->naziv === 'Lekar')
            return view('lekar.lekovi', compact('lekovi'));
        if (\Auth::user()->rola->naziv === 'Sestra')
            return view('sestra.lekovi', compact('lekovi'));
    }
}
