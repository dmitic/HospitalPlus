<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Uloga;

class AdminController extends Controller
{
    public function index()
    {
        $korisnici = User::with('rola')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.sviKorisnici', compact('korisnici'));
    }

    public function create()
    {
        $role = Uloga::all();
        return view('admin.dodajKorisnika', compact('role'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'ime' => 'required|max:50',
            'prezime' => 'required|max:100',
            'telefon' => 'required|max:20',
            'email' => 'required|max:100|email:rfc|unique:users,email',
            'username' => 'required|max:50|unique:users,username',
            'uloga' => 'required|max:1',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'same:password',
        ]);

        $korisnik = new User();
        $korisnik->ime = $request->ime;
        $korisnik->prezime = $request->prezime;
        $korisnik->telefon = $request->telefon;
        $korisnik->email = $request->email;
        $korisnik->username = $request->username;
        $korisnik->uloga_id = $request->uloga;
        $korisnik->password = $request->password;
        $korisnik->save();

        return redirect('/admin/svikorisnici')->withErrors(['poruka' => 'Korisnik je uspešno dodat!']);
    }

    public function edit(User $korisnik)
    {
        $role = Uloga::all();
        return view('admin.dodajKorisnika', compact('korisnik', 'role'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ime' => 'required|max:50',
            'prezime' => 'required|max:100',
            'telefon' => 'required|max:20',
            'email' => 'required|max:100|email:rfc',
            'username' => 'required|max:50',
            'uloga' => 'required|max:1',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'same:password',
        ]);

        $korisnik = User::findOrFail($id);

        $korisnik->update([
            'ime' => request()->ime,
            'prezime' => request()->prezime,
            'telefon' => request()->telefon,
            'email' => request()->email,
            'username' => request()->username,
            'uloga_id' => request()->uloga,
            'password' => request()->password
        ]);

        return redirect('/admin/svikorisnici')->withErrors(['poruka' => 'Korisnik je uspešno izmenjen!']);
    }

    public function destroy(User $korisnik)
    {
        $korisnik->delete();
        return redirect('/admin/svikorisnici')
                    ->withErrors(['poruka' => 'Korisnik je obrisan!']);
    }

    public function search(){
        $str = htmlspecialchars($_GET['str'] ?? ''); 

        $korisnici = User::with('rola')
            ->where('ime', 'like', '%' . $str . '%')
            ->orWhere('prezime', 'like', '%' . $str . '%')
            ->orWhere('email', 'like', '%' . $str . '%')
            ->orWhere('username', 'like', '%' . $str . '%')
            ->orWhere('telefon', 'like', '%' . $str . '%')
            ->orWhereHas('rola', function($query) use ($str){
                $query->where('naziv', 'like', '%' . $str . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.sviKorisnici', compact('korisnici'));
    }
}
