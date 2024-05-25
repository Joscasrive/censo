<?php

use App\Http\Controllers\ClapController;
use App\Http\Controllers\ExportExel;
use App\Http\Controllers\FamiliaController;
use App\Http\Controllers\IndexController;
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
    Route::get('/dashboard',[IndexController::class,'index'])->name('dashboard');
    Route::resource('jefes',JefeController::class)->names('jefes');
    Route::view('familias', 'familias.index')->name('familias.index');
    Route::resource('integrantes',IntegranteController::class)->names('integrantes');
    Route::get('integrantes/export',[ExportExel::class,'exportIntegrante'])->name('integrantes.export');
    Route::view('manzanas', 'manzanas.index')->name('manzanas.index');
    Route::view('claps', 'claps.index')->name('claps.index');
    Route::get('claps/export',[ExportExel::class,'exportClaps'])->name('claps.export');
    Route::view('bombonas', 'bombonas.index')->name('bombonas.index');
});
