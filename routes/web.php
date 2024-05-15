<?php

use App\Http\Controllers\FamiliaController;
use App\Http\Controllers\JefeController;
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
    Route::resource('familias', FamiliaController::class)->only(['index', 'store'])->names('familias');
});
