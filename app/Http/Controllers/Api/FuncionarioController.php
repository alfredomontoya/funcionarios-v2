<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use App\Models\Gestion;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $gestiones = Gestion::activas();

        try {
            $query = Funcionario::orderBy('id', 'desc')
                ->whereIn('gestion_id', $gestiones->pluck('id'));
            // $query = Funcionario::orderBy('id', 'desc');

            // Si se envía un parámetro de búsqueda
            if ($request->filled('search')) {

                $search = $request->input('search');

                $query->where(function ($q) use ($search) {
                    $q->where('ci', 'LIKE', "%{$search}%")
                    ->orWhere('nombres', 'LIKE', "%{$search}%")
                    ->orWhere('apellidos', 'LIKE', "%{$search}%");
                });

            }

            $funcionarios = $query->get();

            // dd($funcionarios);

            return response()->json([
                'status' => true,
                'count' => $funcionarios->count(),
                'funcionarios' => $funcionarios
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }


    public function search($search) {
        $gestiones = Gestion::activas();
        // dd($gestiones);
        try {
            $funcionarios = Funcionario::orderBy('id', 'desc')
                    ->whereIn('gestion_id', $gestiones->pluck('id'))
                    ->where('ci', $search)
                    ->get();
            return response()->json([
                'status' => true,
                'count' => $funcionarios->count(),
                'funcionarios' => $funcionarios
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function show(Funcionario $funcionario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcionario $funcionario)
    {
        //
    }
}
