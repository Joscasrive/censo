<?php

namespace App\Livewire;

use App\Livewire\Forms\familiaEdit;
use App\Models\Familia;
use App\Models\Manzana;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class FamiliasLista extends Component
{
    use WithPagination;
    public $nro_familiar,$codigo_gas,$manzana_id,$boss_id;
    protected $paginationTheme = 'bootstrap';
    
    #[Url(as:'buscar')]
    public $search;
    public familiaEdit $familiaEdit;
    public $familiaId;


    public function create(){
        $rules = [
            'nro_familiar' => ['required', 'max:20', 'unique:familias'],
            'codigo_gas' => ['required', 'max:20', 'unique:familias'],
            'manzana_id' => ['required','max:45','exists:manzanas,id'],
            'boss_id' => ['required','max:45', 'exists:bosses,ci', 'unique:familias']
        ];
        $messages = [];
        $attributes = [
            'nro_familiar' => 'número de familia',
            'codigo_gas' => 'código de gas',
            'manzana_id' => 'Manzana',
            'boss_id' => 'jefe de familia'
        ];
        $this->validate($rules, $messages, $attributes);
       Familia::create([
            'nro_familiar' => $this->nro_familiar,
            'codigo_gas' => $this->codigo_gas,
            'manzana_id' => $this->manzana_id,
            'boss_id' => $this->boss_id
        ]);
        $this->reset();
        $this->dispatch('alert', 'Grupo Familiar Creado');
    }

   public function edit($id){
        $this->familiaEdit->edit($id);


   }

   public function update(){
    $this->familiaEdit->update();
    $this->dispatch('alert', 'Grupo Familiar Actualizado');
   }

    #[On('delete')] 
    public function delete($id){
       Familia::find($id)->delete();
    }
    
    public function closeModal(){
        $this->resetValidation();
    }
    public function updatingSearch(){
        $this->resetPage();
    }
    
    public function render()
    {
    
        $manzanas = Manzana::pluck('nombre','id')->toArray();
        $familias = Familia::where('nro_familiar','Like','%'.$this->search.'%')->paginate(10);
       
        return view('livewire.familias.familia-lista',compact('familias','manzanas'));
    }
}
