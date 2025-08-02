<?php

use App\Http\Controllers\Api\FuncionarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('funcionario/getbyci/{ci}', [FuncionarioController::class, 'getbyci'])
    ->middleware('auth:sanctum')
    ->name('funcionario.getbyci');
Route::get('funcionario', [FuncionarioController::class, 'index'])
    ->middleware('auth:sanctum');
