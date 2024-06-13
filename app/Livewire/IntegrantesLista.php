<?php

namespace App\Livewire;

use App\Models\Integrante;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class IntegrantesLista extends Component
{    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    #[Url(as:'busqueda')]
    public $search;
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $integrantes = Integrante::where('ci','Like','%'.$this->search.'%')->orWhere('correo','Like','%'.$this->search.'%')->paginate(50);
        return view('livewire.integrantes.integrantes-lista',compact('integrantes'));
    }
}
