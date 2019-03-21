<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supir;
use App\Bus;
use App\User;
use App\Kecepatan;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supir = Supir::get()->count();
        $bus = Bus::get()->count();
        $petugas = User::get()->count();
       //$kecepatan = Kecepatan::where('status',1)->get()->count();
        return view('home', compact('supir', 'bus', 'petugas'));
    }
}
