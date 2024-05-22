<?php

namespace App\Livewire\Forms;

use App\Models\Manzana;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class manzanaEdit extends Form
{
    #[Rule('required|max:45')]
    public $nombre;
    #[Rule('required|max:250')]
    public $ubicacion;
    #[Rule('required|exists:claps,id')]
    public $clap_id;
    public $id;

   public function edit($id){
$manzana = Manzana::find($id);
$this->nombre = $manzana->nombre;
$this->ubicacion = $manzana->ubicacion;
$this->clap_id = $manzana->clap_id;
$this->id = $manzana->id;
   }
   
   public function update(){
    $this->validate();
    $manzana = Manzana::find($this->id);
    $manzana->update($this->only(['nombre','ubicacion','clap_id']));
    
     }
}
