<?php

namespace App\Livewire\Forms;

use App\Models\Clap;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class clapEdit extends Form
{
    
   #[Rule('required|max:45')]
   public $nombre;
   #[Rule('required|max:45')]
   public $apellido; 
   #[Rule('required|max:15')]
   public $telefono;
   #[Rule('required|max:45|unique:claps')]
   public $correo;
   #[Rule('required|max:15|unique:claps')]
   public $ci;
   #[Rule('required|in:MANZANERO,UBCH,FFM,UNAMUJER,ALIMENTACION,COMUNICADOR,PRODUCTIVO')]
   public $responsabilidad;
   #[Rule('nullable|max:1024|mimes:jpg,jpeg,png')]
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
       $this->validate();
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

       
    }
}
