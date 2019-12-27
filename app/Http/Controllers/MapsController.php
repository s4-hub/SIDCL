<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapsController extends Controller
{
    public function index(){
        return view('maps.index');
    }

    public function check()
    {
        $a = Perusahaanbinaan::all();
        $b = Potensi::all();

        return collect($a)->merge($b);
    }
}
