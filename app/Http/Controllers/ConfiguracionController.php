<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('soloadmin');
    // }

    public function index() {
        return view('configuracion.index');
    }
}
