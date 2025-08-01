<?php

namespace App\Http\Controllers;

use App\Models\Entrega;
use App\Models\Funcionario;
use App\Models\Gestion;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuncionarioController extends Controller
{
    //

    // public function __construct()
    // {
    //     $this->middleware(['auth', 'user_active']);
    // }

    public function index(Request $request){
        // $funcionario = Funcionario::all();
        // dd($funcionario);
        return "hola";
        // return Funcionario::all();
    }


}
