<?php

namespace App\Livewire\Forms;

use App\Models\Bombona;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class bombonaEdit extends Form
{
   public $id;
   #[Rule('required|in:18kg,32kg,42kg')]
   public $tipo;

   public function edit($id){
$bombona = Bombona::find($id);    
$this->tipo = $bombona->tipo;
$this->id=$bombona->id;
   }
   public function update(){
      $this->validate();
      $bombona = Bombona::find($this->id);
      $bombona->update($this->only(['tipo']));
   }
}
