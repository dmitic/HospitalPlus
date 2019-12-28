<?php

namespace App\Http\Controllers;

use App\Karton;
use App\Pacijent;
use App\Evidencija_lecenja;

use Illuminate\Http\Request;

class KartonController extends Controller
{
    public function index()
    {
        $kartoni = Karton::orderBy('broj_kartona')->paginate(5);

        // Kveri da vidi samo svoje pacijente - u principu ga ograničava da izvrši pregled nad tuđim pacijentom što je loše
        
        // $pacijentiLekar = Pacijent::with('karton')
        //     ->whereHas('izabraniLekar', function($query) {
        //             $query->where('id', '=', \Auth::user()->id);
        //         })
        //     ->orderBy('ime')->paginate(5);
        
        $pacijenti = Pacijent::orderBy('created_at', 'desc')->paginate(5);

        if (\Auth::user()->rola->naziv == 'Lekar')
            return view('lekar.kartoni', compact('kartoni', 'pacijenti'));
            // return view('lekar.kartoni', compact('kartoni', 'pacijentiLekar'));
        if (\Auth::user()->rola->naziv == 'Sestra')
            return view('sestra.kartoni', compact('kartoni', 'pacijenti'));
    }

    public function create()
    {
        if (\Auth::user()->rola->naziv === 'Lekar')
            return view('lekar.dodajKarton');
        if (\Auth::user()->rola->naziv === 'Sestra')
            return view('sestra.dodajKarton');
    }

    public function store(Request $request, Pacijent $pacijent)
    {
        $request->validate([
            'brojKartona' => 'required|max:20|unique:kartoni,broj_kartona',
        ]);

        $karton = new Karton();
        $karton->broj_kartona = $request->brojKartona;
        $karton->pacijent_id = $pacijent->id;
        $karton->save();

        if (\Auth::user()->rola->naziv == 'Lekar')
            return redirect('/lekar/kartoni')->withErrors(['poruka' => 'Karton je uspešno otvoren!']);
        if (\Auth::user()->rola->naziv == 'Sestra')
            return redirect('/sestra/kartoni')->withErrors(['poruka' => 'Karton je uspešno otvoren!']);
    }

    public function show(Karton $karton)
    {
        $pregledi = Evidencija_lecenja::where('karton_id', $karton->id)->orderBy('datum_posete', 'desc')->paginate(5);

        if (\Auth::user()->rola->naziv === 'Lekar')
            return view('lekar.karton', compact('karton', 'pregledi'));
        if (\Auth::user()->rola->naziv === 'Sestra')
            return view('sestra.karton', compact('karton', 'pregledi'));
    }

    public function edit(Karton $karton, Pacijent $pacijent)
    {
        if (\Auth::user()->rola->naziv === 'Lekar')
            return view('lekar.dodajKarton', compact('pacijent'));
        if (\Auth::user()->rola->naziv === 'Sestra')
            return view('sestra.dodajKarton', compact('pacijent'));
    }

    public function update(Request $request, Pacijent $pacijent)
    {
        $karton = Karton::where('pacijent_id', $pacijent->id)->first();
        $request->validate([
            'brojKartona' => 'required|max:20|unique:kartoni,broj_kartona',
        ]);

        $karton->update([
            'broj_kartona' => request()->brojKartona,
        ]);

        if (\Auth::user()->rola->naziv === 'Lekar')
            return redirect('/lekar/kartoni')->withErrors(['poruka' => 'Karton je uspešno izmenjen!']);
        if (\Auth::user()->rola->naziv === 'Sestra')
            return redirect('/sestra/kartoni')->withErrors(['poruka' => 'Karton je uspešno izmenjen!']);
    }

    public function search(){
        $str = htmlspecialchars($_GET['str'] ?? ''); 

        $pacijenti = Pacijent::with('izabraniLekar')
            ->where('ime', 'like', '%' . $str . '%')
            ->orWhere('prezime', 'like', '%' . $str . '%')
            ->orWhere('lbo', 'like', '%' . $str . '%')
            ->orWhereHas('izabraniLekar', function($query) use ($str){
                $query->where('ime', 'like', '%' . $str . '%');
            })
            ->orWhereHas('izabraniLekar', function($query) use ($str){
                $query->where('prezime', 'like', '%' . $str . '%');
            })
            ->orWhereHas('karton', function($query) use ($str){
                $query->where('broj_kartona', 'like', '%' . $str . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        if (\Auth::user()->rola->naziv === 'Lekar')
            return view('lekar.kartoni', compact('pacijenti'));
        if (\Auth::user()->rola->naziv === 'Sestra')
            return view('sestra.kartoni', compact('pacijenti'));
    }
}
