<?php

use App\Http\Controllers\ClapController;
use App\Http\Controllers\ExportExel;
use App\Http\Controllers\FamiliaController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\IntegranteController;
use App\Http\Controllers\JefeController;
use App\Http\Controllers\ManzanaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    // config('jetstream.auth_session'),
    // 'verified',
])->group(function () {
    //Panel Principal
    Route::get('/dashboard',[IndexController::class,'index'])->name('dashboard');
    //Grupo de Rutas
    Route::controller(JefeController::class)->group(function(){
        Route::get('jefes', 'index')->name('jefes.index')->middleware('can:dashboard');
        Route::get('jefes/create', 'create')->name('jefes.create')->middleware('can:modificacion');
        Route::post('jefes', 'store')->name('jefes.store')->middleware('can:modificacion');
        Route::get('jefes/{jefe}', 'show')->name('jefes.show')->middleware('can:dashboard');
        Route::get('jefes/{jefe}/edit', 'edit')->name('jefes.edit')->middleware('can:modificacion');
        Route::put('jefes/{jefe}', 'update')->name('jefes.update')->middleware('can:modificacion');
        Route::delete('jefes/{jefe}', 'destroy')->name('jefes.destroy')->middleware('can:modificacion');
    });
    Route::controller(IntegranteController::class)->group(function(){
        Route::get('integrantes','index')->name('integrantes.index')->middleware('can:dashboard');
        Route::get('integrantes/create','create')->name('integrantes.create')->middleware('can:modificacion');
        Route::post('integrantes', 'store')->name('integrantes.store')->middleware('can:modificacion');
        Route::get('integrantes/{integrante}','show')->name('integrantes.show')->middleware('can:dashboard');
        Route::get('integrantes/{integrante}/edit', 'edit')->name('integrantes.edit')->middleware('can:modificacion');
        Route::put('integrantes/{integrante}','update')->name('integrantes.update')->middleware('can:modificacion');
        Route::delete('integrantes/{integrante}','destroy')->name('integrantes.destroy')->middleware('can:modificacion');
    });
    Route::controller(UserController::class)->group(function () {
        Route::get('users', 'index')->name('admin.index')->middleware('can:modificacion');
        Route::get('users/{user}/edit', 'edit')->name('admin.edit')->middleware('can:modificacion');;
        Route::put('users/{user}', 'update')->name('admin.update')->middleware('can:modificacion');;
      
    });
   
    //Vistas
    Route::view('familias', 'familias.index')->name('familias.index')->middleware('can:dashboard');
    Route::view('manzanas', 'manzanas.index')->name('manzanas.index')->middleware('can:dashboard');
    Route::view('datos', 'datos.index')->name('datos.index')->middleware('can:dashboard');
    Route::view('claps', 'claps.index')->name('claps.index')->middleware('can:dashboard');
    Route::view('bombonas', 'bombonas.index')->name('bombonas.index')->middleware('can:dashboard');
    //reportes
    Route::get('integrante/export',[ExportExel::class,'exportIntegrante'])->name('integrantes.export')->middleware('can:reportes');
    Route::get('clap/export',[ExportExel::class,'exportClaps'])->name('claps.export')->middleware('can:reportes');;
    Route::get('bombona/export',[ExportExel::class,'exportBombonas'])->name('bombonas.export')->middleware('can:reportes');;
    Route::get('dato/export',[ExportExel::class,'exportDatos'])->name('datos.export')->middleware('can:reportes');;
   

    
});
