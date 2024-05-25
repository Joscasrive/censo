<?php

namespace App\Livewire;

use App\Livewire\Forms\bombonaEdit;
use App\Models\Bombona;
use Livewire\Attributes\On;
use Livewire\Component;

class BombonasLista extends Component
{   
   
    public $tipo;
    public bombonaEdit $bombonaEdit;
    public function create(){
        $this->validate(['tipo'=>'required|in:18kg,32kg,42kg']);
       Bombona::create($this->only(['tipo']));
       $this->dispatch('alert','Bombona agregada');
    }
    public function edit($id){
$this->bombonaEdit->edit($id);
    }
    public function update(){
        $this->bombonaEdit->update();
        $this->dispatch('alert','Dato Actualizado');
    }
    #[On('delete')]
    public function delete($id){
 Bombona::find($id)->delete();;
    
    }

    public function closeModal(){
        $this->resetValidation();
       
    }
    public function render()
    {
        $bombonas = Bombona::paginate();
        return view('livewire.bombonas.bombonas-lista',compact('bombonas'));
    }
}
