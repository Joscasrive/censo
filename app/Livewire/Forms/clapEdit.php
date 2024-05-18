<?php

namespace App\Livewire\Forms;

use App\Models\Clap;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;

class clapEdit extends Form
{
    
    public $nombre,$apellido,$telefono, $correo, $ci,$responsabilidad,$img,$id;
    
    public function edit($id){
   $clap =Clap::find($id);
   $this->nombre = $clap->nombre;
   $this->apellido = $clap->apellido;
   $this->telefono = $clap->telefono;
   $this->correo = $clap->correo;
   $this->ci = $clap->ci;
   $this->responsabilidad = $clap->responsabilidad;
   $this->img = $clap->img;
   $this->id = $clap->id;

    }
    public function update(){
       
     $clap = Clap::find($this->id);
     if ($this->img != $clap->img) {
        Storage::delete($clap->img);
          $file = uniqid(). '.'. $this->img->getClientOriginalExtension();
        $file = $this->img->storeAs('claps', $file);
        $this->img =$file;
       }
     $clap->update($this->only([
        'nombre',
        'apellido',
        'telefono',
        'correo',
        'ci',
        'responsabilidad',
        'img'
     ]));
     

       
    }
}
