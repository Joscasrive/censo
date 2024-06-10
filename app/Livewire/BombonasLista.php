<?php

namespace App\Livewire;


use App\Models\Bombona;
use Livewire\Attributes\On;
use Livewire\Component;

class BombonasLista extends Component
{   
   
    public $tipo;
    public function create(){
        $this->validate(['tipo'=>'required|in:10kg,18kg,27kg,43kg|unique:bombonas']);
       Bombona::create($this->only(['tipo']));
       $this->dispatch('alert','Bombona agregada');
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
