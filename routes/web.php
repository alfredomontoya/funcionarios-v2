<?php

use App\Http\Controllers\Api\FuncionarioController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\EdificioController;
use App\Http\Controllers\EntregaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});



Route::resource('edificio', EdificioController::class);

Route::resource('user', UserController::class);

Route::resource('entrega', EntregaController::class);
Route::resource('configuracion', ConfiguracionController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->get('/funcionarios', function () {
    return Inertia::render('funcionario/FuncionarioSearchPage');
});


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
