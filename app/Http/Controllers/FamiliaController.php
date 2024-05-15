<?php

namespace App\Http\Controllers;

use App\Models\Boss;
use App\Models\Familia;
use App\Models\Manzana;
use Illuminate\Http\Request;

class FamiliaController extends Controller
{
    
    public function index()
    { 
        $jefes = Boss::pluck('nombres','id')->toArray();
        $manzanas = Manzana::pluck('nombre','id')->toArray();
       

        return view('familias.index',compact('jefes','manzanas'));
    }

    
   
   
    public function store(Request $request)
    {
        $request->validate(['nro_familiar' => 'required|max:20|unique:familias',
        'codigo_gas' => 'required|max:20|unique:familias',
        'manzana_id' => 'required|max:45|exists:manzanas,id',
        'boss_id' => 'required|max:45|exists:bosses,id|unique:familias']);
      Familia::create($request->all());
      return redirect()->route('familias.index')->with('info','Familia Creada');
    }


    
}
