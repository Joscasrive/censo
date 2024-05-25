<?php

namespace App\Livewire;

use App\Livewire\Forms\manzanaEdit;
use App\Models\Clap;
use App\Models\Manzana;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ManzanasLista extends Component
{
    use WithPagination;
  
    public $nombre;
 
    public $ubicacion;
   
    public $clap_id;
    protected $paginationTheme = 'bootstrap';
    #[Url(as:'busqueda')]
    public $search;
    public manzanaEdit $manzanaEdit;

    public function create(){
        $this->validate([
            'nombre' => 'required|max:45',
            'ubicacion' => 'required|max:250',
            'clap_id' => 'required|exists:claps,id',
        ]);
        Manzana::create($this->only(['nombre','ubicacion','clap_id']));
        $this->dispatch('alert','Manzana Creada');
    }
    public function edit($id){
       $this->manzanaEdit->edit($id);
    }
    public function update(){
        $this->manzanaEdit->update();
        $this->dispatch('alert','Manzana Actualizada');
    }
    #[On('delete')]
    public function delete($id){
       $manzana = Manzana::find($id);
       $manzana->delete();
    }
    public function closeModal(){
        $this->resetValidation();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $manzanas = Manzana::paginate();
        $responsables = Clap::where('responsabilidad','MANZANERO')->get();
        return view('livewire.manzanas.manzanas-lista',compact('manzanas','responsables'));
    }
}
