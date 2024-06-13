<?php

namespace App\Livewire\Forms;

use App\Models\Clap;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class clapEdit extends Form
{
    
 
   public $nombre;
   public $apellido; 
   public $telefono;
   public $correo;
   public $ci;
   public $responsabilidad;
   public $img;
   public$imgActual;
    public $id;
    
    public function edit($id){
   $clap =Clap::find($id);
   $this->nombre = $clap->nombre;
   $this->apellido = $clap->apellido;
   $this->telefono = $clap->telefono;
   $this->correo = $clap->correo;
   $this->ci = $clap->ci;
   $this->responsabilidad = $clap->responsabilidad;
   $this->imgActual = $clap->img;
   $this->id = $clap->id;

    }
    public function update(){
      $this->validate([
         'nombre' => 'required|max:45|regex:/^[a-zA-Z ]+$/',
         'apellido' => 'required|max:45|regex:/^[a-zA-Z ]+$/',
         'telefono' => 'required|max:15|regex:/^[0-9+]+$/',
         'correo' => 'required|email|max:45|unique:claps,correo,'. $this->id,
         'ci' => 'required|max:15|regex:/^[a-zA-Z0-9-]+$/|unique:claps,ci,'. $this->id,
         'responsabilidad' => 'required|in:MANZANERO,UBCH,FFM,UNAMUJER,ALIMENTACION,COMUNICADOR,PRODUCTIVO',
         'img' => 'nullable|max:1024|mimes:jpg,jpeg,png'
     ]);
     $clap = Clap::find($this->id);
     if($this->img){
        if ($clap->img && $this->img != $clap->img) {
          Storage::delete($clap->img);
         }
      
      $file = uniqid(). '.'. $this->img->getClientOriginalExtension();
      $file = $this->img->storeAs('claps', $file);
      $this->img =$file;
  $clap->img = $this->img;
  $clap->save();
     }
     
     $clap->update($this->only([
        'nombre',
        'apellido',
        'telefono',
        'correo',
        'ci',
        'responsabilidad',
     ]));
     $this->img = false;
     $this->reset();
       
    }
}
