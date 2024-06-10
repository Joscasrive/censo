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
        'nombre'=>'required',
        'codigo'=>'required',
        'municipio'=>'required',
        'parroquia'=>'required',
        'rif'=>'required',
        'clap'=>'required',
        'correo'=>'required',
        'misiones'=>'required',
        'centro'=>'required',
        'norte'=>'required',
        'sur'=>'required',
        'este'=>'required',
        'oeste'=>'required',
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
            'nombre'=>'required',
            'codigo'=>'required',
            'municipio'=>'required',
            'parroquia'=>'required',
            'rif'=>'required',
            'clap'=>'required',
            'correo'=>'required',
            'misiones'=>'required',
            'centro'=>'required',
            'norte'=>'required',
            'sur'=>'required',
            'este'=>'required',
            'oeste'=>'required',
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
