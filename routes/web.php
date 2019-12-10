<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->middleware('rola')->name('home');
Route::get('/home', 'HomeController@index')->middleware('rola')->name('home');


Route::prefix('/admin')->middleware(['admin', 'auth'])->group(function()
{
    Route::get('/','HomeController@admin');
    Route::get('/svikorisnici', 'AdminController@index');
    Route::get('/dodajkorisnika', 'AdminController@create');
    Route::get('/izmenikorisnika/{korisnik}', 'AdminController@edit')->name('izmeniKorisnika');
    Route::get('/pretragaKorisnika', 'AdminController@search');
    Route::put('/izmenikorisnika/{korisnik}', 'AdminController@update')->name('snimiKorisnika');
    Route::post('/dodajKorisnika', 'AdminController@store')->name('dodajKorisnika');
    Route::delete('/obrisi/{korisnik}/delete', 'AdminController@destroy')->name('obrisiKorisnika');
    
});

Route::prefix('/lekar')->middleware(['lekar', 'auth'])->group(function()
{
    Route::get('/','HomeController@lekar');

    // Bolesti
    Route::get('/bolesti','BolestController@index');
    Route::get('/pretragaBolesti','BolestController@search');
    Route::get('/dodajBolest','BolestController@create');
    Route::get('/izmenibolest/{bolest}', 'BolestController@edit')->name('izmeniBolestLekar');
    Route::put('/izmenibolest/{bolest}', 'BolestController@update')->name('snimiBolestLekar');
    Route::post('/dodajBolest', 'BolestController@store')->name('dodajBolestLekar');

    // Lekovi
    Route::get('/lekovi','LekController@index');
    Route::get('/pretragaLekova','LekController@search');
    Route::get('/dodajLek','LekController@create');
    Route::get('/izmenilek/{lek}', 'LekController@edit')->name('izmeniLekLekar');
    Route::put('/izmenilek/{lek}', 'LekController@update')->name('snimiLekLekar');
    Route::post('/dodajLek', 'LekController@store')->name('dodajLekLekar');
    Route::delete('/lekovi/{lek}/delete','LekController@destroy')->name('obrisiLekLekar');

    // Kartoni
    Route::get('/kartoni','KartonController@index');
    Route::get('/pretragaKartona','KartonController@search');
    Route::get('/dodajKarton','KartonController@create');
    
});

Route::prefix('/sestra')->middleware(['sestra', 'auth'])->group(function()
{
    Route::get('/','HomeController@sestra');

    // Pacijenti
    Route::get('/pacijenti','PacijentController@index');
    Route::get('/pretragaPacijenata','PacijentController@search');
    Route::get('/dodajPacijenta','PacijentController@create');
    Route::get('/izmenipacijenta/{pacijent}', 'PacijentController@edit')->name('izmeniPacijenta');
    Route::put('/izmenipacijenta/{pacijent}', 'PacijentController@update')->name('snimiPacijenta');
    Route::post('/dodajPacijenta', 'PacijentController@store')->name('dodajPacijenta');
    Route::delete('/pacijenti/{pacijent}/delete','PacijentController@destroy')->name('obrisiPacijenta');

    // Bolesti
    Route::get('/bolesti','BolestController@index');
    Route::get('/pretragaBolesti','BolestController@search');
    Route::get('/dodajBolest','BolestController@create');
    Route::get('/izmenibolest/{bolest}', 'BolestController@edit')->name('izmeniBolest');
    Route::put('/izmenibolest/{bolest}', 'BolestController@update')->name('snimiBolest');
    Route::post('/dodajBolest', 'BolestController@store')->name('dodajBolest');

    // Lekovi
    Route::get('/lekovi','LekController@index');
    Route::get('/pretragaLekova','LekController@search');
    Route::get('/dodajLek','LekController@create');
    Route::get('/izmenilek/{lek}', 'LekController@edit')->name('izmeniLek');
    Route::put('/izmenilek/{lek}', 'LekController@update')->name('snimiLek');
    Route::post('/dodajLek', 'LekController@store')->name('dodajLek');
    Route::delete('/lekovi/{lek}/delete','LekController@destroy')->name('obrisiLek');

    // Kartoni
    Route::get('/kartoni','KartonController@index');
    Route::get('/pretragaKartona','KartonController@search');
    Route::get('/dodajKarton','KartonController@create');
});