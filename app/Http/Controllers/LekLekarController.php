<?php

namespace App\Http\Controllers;

use App\Lek;
use Illuminate\Http\Request;

class LekLekarController extends Controller
{
    public function index()
    {
        $lekovi = Lek::orderBy('naziv')->paginate(10);
        return view('lekar.lekovi', compact('lekovi'));
    }

    public function create()
    {
        return view('lekar.dodajLek');
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

        return redirect('/lekar/lekovi')->withErrors(['poruka' => 'Lek je uspešno unet!']);
    }

    public function show(Lek $lek)
    {
        //
    }

    public function edit(Lek $lek)
    {
        return view('lekar.dodajLek', compact('lek'));
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

        return redirect('/lekar/lekovi')->withErrors(['poruka' => 'Podaci o leku su uspešno izmenjeni!']);
    }

    public function destroy(Lek $lek)
    {
        $lek->delete();
        return redirect('/lekar/lekovi')
                    ->withErrors(['poruka' => 'Lek je obrisan!']);
    }

    public function search(){
        $str = htmlspecialchars($_GET['str'] ?? ''); 

        $lekovi = Lek::where('naziv', 'like', '%' . $str . '%')
            ->orderBy('naziv')
            ->paginate(10);

        return view('lekar.lekovi', compact('lekovi'));
    }
}
