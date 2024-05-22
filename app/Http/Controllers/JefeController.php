<?php

namespace App\Http\Controllers;

use App\Http\Requests\BossRequest;
use App\Models\Boss;
use Illuminate\Http\Request;

class JefeController extends Controller
{
    
    public function index()
    {
       return view('jefes.index');
    }

    
    public function create()
    {
        return view('jefes.create');
    }

    
    public function store(BossRequest $request)
    {
        Boss::create($request->all());
        return redirect()->route('jefes.index')->with('info','Jefe Creado');
    }

    
    public function show(Boss $jefe)
    {
 $edad = $jefe->fecha_nacimiento;
 $edad = $this->calcularEdad($edad);
      return view('jefes.show',compact('jefe','edad'));
    }

    
    public function edit(Boss $jefe)
    {
        return view('jefes.edit',compact('jefe'));
    }

    
    public function update(BossRequest $request, Boss $jefe)
    {
        $jefe->update($request->all());
        return redirect()->route('jefes.index')->with('info','Datos actualizado');;
    }

    
    public function destroy(Boss $jefe)
    {
        $jefe->delete();
        return redirect()->route('jefes.index')->with('info','Dato Borrado');
    }
}
