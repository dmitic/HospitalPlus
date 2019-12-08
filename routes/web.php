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
// Route::get('/home', 'HomeController@index')->middleware('rola')->name('home');


Route::prefix('/admin')->middleware('admin')->group(function()
{
    Route::get('/','HomeController@admin');
    
});

Route::prefix('/lekar')->middleware('lekar')->group(function()
{
    Route::get('/','HomeController@lekar');
    
});

Route::prefix('/sestra')->middleware('sestra')->group(function()
{
    Route::get('/','HomeController@sestra');
    
});