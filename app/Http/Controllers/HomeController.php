<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('rola');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }
    public function admin()
    {
        return view('admin.logovan');
    }
    public function lekar()
    {
        return view('lekar.logovan');
    }
    public function sestra()
    {
        return view('sestra.logovan');
    }
}
