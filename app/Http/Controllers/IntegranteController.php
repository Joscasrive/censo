<?php

namespace App\Http\Controllers;


use App\Http\Requests\IntegranteRequest;
use App\Models\Boss;
use App\Models\Familia;
use App\Models\Integrante;
use Illuminate\Http\Request;


class IntegranteController extends Controller
{
    
    public function index()
    {
       
        return view('integrantes.index');
    }

    
    public function create()
    {
        
       return  view('integrantes.create');
    }

    
    public function store(IntegranteRequest $request)
    {
        $guardar = request()->except('_token');
        if($request->tipo_persona == 'Jefe'){
            $jefe = Boss::where('ci',$request->ci)->first();
         if(isset($jefe)){
            $id_familia = Familia::where('nro_familiar',$request->familia_id)->first();
             $guardar['familia_id'] = $id_familia->id;
            Integrante::create($guardar);
            return redirect()->route('integrantes.index')->with('info','Integrante Agregado');
         }else{
            return redirect()->route('integrantes.create')->with('info','El jefe no existe en la base de datos');
         }

    }else{
        $jefe = Boss::where('ci',$request->ci)->first();
        if(isset($jefe)){
            return redirect()->route('integrantes.create')->with('info','La cedula ingresada pertenece a un jefe de familia , seleccion la opcion correspodiente para el registro');
          }else{
            $id_familia = Familia::where('nro_familiar',$request->familia_id)->first();
             $guardar['familia_id'] = $id_familia->id;
             Integrante::create($guardar);
             return redirect()->route('integrantes.index')->with('info','Integrante Agregado');
          }
    }
        
        
    }
   
    
    public function show(Integrante $integrante)
    {
         $total = Integrante::where('familia_id',$integrante->familia->id)->count();
        $fechaNacimiento = $integrante->fecha_nacimiento;
       $edad =  $this->calcularEdad($fechaNacimiento);
        return view('integrantes.show',compact('integrante','edad','total'));
    }

   
    public function edit(Integrante $integrante)
    {   
        
        return view('integrantes.edit',compact('integrante'));
    }

 
    public function update(IntegranteRequest $request, Integrante $integrante)
    {
        $guardar = request()->except('_token');
        if($request->tipo_persona == 'Jefe'){
            $jefe = Boss::where('ci',$request->ci)->first();
         if(isset($jefe)){
            $id_familia = Familia::where('nro_familiar',$request->familia_id)->first();
            $guardar['familia_id'] = $id_familia->id;
             $integrante->update($guardar);
            return redirect()->route('integrantes.index')->with('info','Dato actualizado');
         }else{
            return redirect()->route('integrantes.edit',$integrante)->with('info','El jefe no existe en la base de datos');
         }

    }else{
        $jefe = Boss::where('ci',$request->ci)->first();
        if(isset($jefe)){
            return redirect()->route('integrantes.edit',$integrante)->with('info','La cedula ingresada pertenece a un jefe de familia , seleccion la opcion correspodiente para el registro');
          }else{
            $id_familia = Familia::where('nro_familiar',$request->familia_id)->first();
            $guardar['familia_id'] = $id_familia->id;
             $integrante->update($guardar);
             return redirect()->route('integrantes.index')->with('info','Integrante actualizado');
          }
    }
     
    }

    
    public function destroy(Integrante $integrante)
    {
        $integrante->delete();
        return redirect()->route('integrantes.index')->with('info','Integrante eliminado');
       
    }

   
}
