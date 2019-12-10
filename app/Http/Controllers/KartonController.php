<?php

namespace App\Http\Controllers;

use App\Karton;
use Illuminate\Http\Request;

class KartonController extends Controller
{
    public function index()
    {
        $kartoni = Karton::orderBy('broj_kartona')->paginate(10);

        if (\Auth::user()->rola->naziv == 'Lekar')
            return view('lekar.kartoni', compact('kartoni'));
        if (\Auth::user()->rola->naziv == 'Sestra')
            return view('sestra.kartoni', compact('kartoni'));
    }

    public function create()
    {
        if (\Auth::user()->rola->naziv === 'Lekar')
            return view('lekar.dodajKarton');
        if (\Auth::user()->rola->naziv === 'Sestra')
            return view('sestra.dodajKarton');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Karton $karton)
    {
        //
    }

    public function edit(Karton $karton)
    {
        //
    }

    public function update(Request $request, Karton $karton)
    {
        //
    }

    public function destroy(Karton $karton)
    {
        //
    }

    public function search(){
        $str = htmlspecialchars($_GET['str'] ?? ''); 
        $kartoni = Karton::with('pacijent')
            ->where('broj_kartona', 'like', '%' . $str . '%')
            ->orWhereHas('pacijent', function($query) use ($str){
                $query->where('ime', 'like', '%' . $str . '%');
            })
            ->orWhereHas('pacijent', function($query) use ($str){
                $query->where('prezime', 'like', '%' . $str . '%');
            })
            ->orWhereHas('pacijent', function($query) use ($str){
                $query->where('lbo', 'like', '%' . $str . '%');
            })
            ->orWhereHas('pacijent.izabraniLekar', function($query) use ($str){
                $query->where('ime', 'like', '%' . $str . '%');
            })
            ->orWhereHas('pacijent.izabraniLekar', function($query) use ($str){
                $query->where('prezime', 'like', '%' . $str . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        if (\Auth::user()->rola->naziv === 'Lekar')
            return view('lekar.kartoni', compact('kartoni'));
        if (\Auth::user()->rola->naziv === 'Sestra')
            return view('sestra.kartoni', compact('kartoni'));
    }
}
