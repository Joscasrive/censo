<?php

use App\Http\Controllers\ClapController;
use App\Http\Controllers\FamiliaController;
use App\Http\Controllers\IntegranteController;
use App\Http\Controllers\JefeController;
use App\Http\Controllers\ManzanaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('jefes',JefeController::class)->names('jefes');
    Route::get('familias', [FamiliaController::class,'index'])->name('familias.index');
    Route::resource('integrantes',IntegranteController::class)->names('integrantes');
    Route::get('manzanas',[ManzanaController::class,'index'])->name('manzanas.index');
    Route::get('claps',[ClapController::class,'index'])->name('claps.index');
});
