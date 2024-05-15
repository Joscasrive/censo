<?php

namespace App\Livewire;


use App\Models\Familia;
use Livewire\Attributes\On;
use Livewire\Component;

class FamiliaLista extends Component
{
    public $jefes ,$manzanas,$message;
    public $search;
    public $familiaEdit = [
        'nro_familiar' => '',
        'codigo_gas'=>'',
        'manzana_id' => '',
        'boss_id' => '',
    ];
    public $familiaId;

    public function edit(Familia $familia){
$this->familiaId = $familia->id;

$this->familiaEdit['nro_familiar']=$familia->nro_familiar;
$this->familiaEdit['codigo_gas']=$familia->codigo_gas;
$this->familiaEdit['manzana_id']=$familia->manzana_id;
$this->familiaEdit['boss_id']=$familia->boss_id;
    }

    public function update(){
        $rules = [
            'familiaEdit.nro_familiar' => ['required', 'max:20', 'unique:familias,nro_familiar,'.$this->familiaId],
            'familiaEdit.codigo_gas' => ['required', 'max:20', 'unique:familias,codigo_gas,'.$this->familiaId],
            'familiaEdit.manzana_id' => ['required', 'max:45', 'exists:manzanas,id'],
            'familiaEdit.boss_id' => ['required', 'max:45', 'exists:bosses,id', 'unique:familias,boss_id,'.$this->familiaId]
        ];
        $messages = [];
        $attributes = [
            'familiaEdit.nro_familiar' => 'número de familia',
            'familiaEdit.codigo_gas' => 'código de gas',
            'familiaEdit.manzana_id' => 'Manzana',
            'familiaEdit.boss_id' => 'jefe de familia'
        ];
        $this->validate($rules, $messages, $attributes);
        $familia = Familia::find($this->familiaId);
       $familia->update($this->familiaEdit);
        $this->reset('familiaEdit');
        $this->dispatch('alert','Dato actualizado');
        
       
       
    }
    #[On('delete')] 
    public function delete($id){
       Familia::find($id)->delete();
    }
    
    public function closeModal(){
        $this->resetValidation();
    }
    
    public function render()
    {
       
        $familias = Familia::where('nro_familiar','Like','%'.$this->search.'%')->paginate(10);
        return view('livewire.familia-lista',compact('familias'));
    }
}
