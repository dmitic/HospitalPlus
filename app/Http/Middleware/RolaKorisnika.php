<?php

namespace App\Http\Middleware;

use Closure;
// use Illuminate\Support\Facades\Auth;

class RolaKorisnika
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $korisnikRola = \Auth::user()->rola->naziv;
        // dd($korisnikRola);

        if($korisnikRola == 'Admin')
            return redirect('/admin');
        if($korisnikRola == 'Lekar')
            return redirect('/lekar');
        if($korisnikRola == 'Sestra')
            return redirect('/sestra');

        return $next($request);
    }
}


