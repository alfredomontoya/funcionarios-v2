<?php

use App\Http\Controllers\Api\FuncionarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('funcionario/getbyci/{ci}', [FuncionarioController::class, 'getbyci'])->name('funcionario.getbyci');
Route::resource('funcionario', FuncionarioController::class);