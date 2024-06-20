<?php

namespace App\Livewire;

use App\Models\Dato;
use Livewire\Attributes\On;
use Livewire\Component;

class Datos extends Component
{
    public $nombre,$codigo,$municipio,$parroquia,$rif,$clap,$correo,$misiones,$centro,$norte,$sur,$este,$oeste,$id;
    
    public function save(){
       $this->validate([
        'nombre'=>'required|regex:/^[a-zA-Z ]+$/',
        'codigo'=>'required|regex:/^[a-zA-Z0-9]+$/',
        'municipio'=>'required|regex:/^[a-zA-Z]+$/',
        'parroquia'=>'required|regex:/^[a-zA-Z]+$/',
        'rif'=>'required|regex:/^[a-zA-Z0-9-]+$/',
        'clap'=>'required',
        'correo'=>'required|email',
        'misiones'=>'required|regex:/^[a-zA-Z]+$/',
        'centro'=>'required|regex:/^[a-zA-Z]+$/',
        'norte'=>'required|regex:/^[a-zA-Z0-9 ]+$/',
        'sur'=>'required|regex:/^[a-zA-Z0-9 ]+$/',
        'este'=>'required|regex:/^[a-zA-Z0-9 ]+$/',
        'oeste'=>'required|regex:/^[a-zA-Z0-9 ]+$/',
        ]);
        Dato::create($this->only(['nombre','codigo','municipio','parroquia','rif',
        'clap','correo','misiones','centro','norte','sur','este','oeste']));
        $this->dispatch('alert','Dato Guardado');
    }
    #[On('delete')]
    public function delete(){
        Dato::find($this->id)->delete();
        
    }
    public function update(){
        $this->validate([
            'nombre'=>'required|regex:/^[a-zA-Z ]+$/',
            'codigo'=>'required|regex:/^[a-zA-Z0-9]+$/',
            'municipio'=>'required|regex:/^[a-zA-Z ]+$/',
            'parroquia'=>'required|regex:/^[a-zA-Z ]+$/',
            'rif'=>'required|regex:/^[a-zA-Z0-9-]+$/',
            'clap'=>'required',
            'correo'=>'required|email',
            'misiones'=>'required|regex:/^[a-zA-Z ]+$/',
            'centro'=>'required|regex:/^[a-zA-Z ]+$/',
            'norte'=>'required|regex:/^[a-zA-Z0-9 ]+$/',
            'sur'=>'required|regex:/^[a-zA-Z0-9 ]+$/',
            'este'=>'required|regex:/^[a-zA-Z0-9 ]+$/',
            'oeste'=>'required|regex:/^[a-zA-Z0-9 ]+$/',
            ]);
        $dato = Dato::find($this->id);
        $dato->update($this->only(['nombre','codigo','municipio','parroquia
        ','rif','clap','correo','misiones','centro','norte','sur
        ','este','oeste']));
        $this->dispatch('alert','Dato Actualizado');
    }
    public function render()
    {
        $datos = Dato::first();
        if($datos){
            $this->nombre = $datos->nombre;
            $this->codigo = $datos->codigo;
            $this->municipio = $datos->municipio;
            $this->parroquia = $datos->parroquia;
            $this->rif = $datos->rif;
            $this->clap = $datos->clap;
            $this->correo = $datos->correo;
            $this->misiones = $datos->misiones;
            $this->centro = $datos->centro;
            $this->norte = $datos->norte;
            $this->sur = $datos->sur;
            $this->este = $datos->este;
            $this->oeste = $datos->oeste;
            $this->id = $datos->id;
        }
        
        return view('livewire.datos',compact('datos'));
    }
}
