<?php

namespace App\Livewire\Forms;

use App\Models\Familia;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\Component;
class familiaEdit extends Form
{
   public $nro_familiar,$codigo_gas,$manzana_id,$boss_id;
   public $familiaId;

   public function edit($id){
    $familia = Familia::find($id);
    $this->familiaId = $familia->id;
    $this->nro_familiar=$familia->nro_familiar;
    $this->codigo_gas=$familia->codigo_gas;
    $this->manzana_id=$familia->manzana_id;
    $this->boss_id=$familia->boss_id;
        }

    public function update(){
        
            $rules = [
                'nro_familiar' => ['required', 'max:20', 'unique:familias,nro_familiar,'.$this->familiaId],
                'codigo_gas' => ['required', 'max:20', 'unique:familias,codigo_gas,'.$this->familiaId],
                'manzana_id' => ['required', 'max:45', 'exists:manzanas,id'],
                'boss_id' => ['required', 'max:45', 'exists:bosses,ci', 'unique:familias,boss_id,'.$this->familiaId]
            ];
            $messages = [];
            $attributes = [
                'nro_familiar' => 'número de familia',
                'codigo_gas' => 'código de gas',
                'manzana_id' => 'Manzana',
                'boss_id' => 'jefe de familia'
            ];
            $this->validate($rules, $messages, $attributes);
            $familia = Familia::find($this->familiaId);
           $familia->update(
            [
                'nro_familiar' => $this->nro_familiar,
                'codigo_gas' => $this->codigo_gas,
                'manzana_id' => $this->manzana_id,
                'boss_id' => $this->boss_id
            ]
           );
            $this->reset();
            
           
        }
}
