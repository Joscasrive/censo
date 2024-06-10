<?php

namespace App\Livewire;

use App\Models\Boss;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ListBosses extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    #[Url(as:'busqueda')]
    public $search;
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $jefes = Boss::where('ci','Like','%'.$this->search.'%')->orWhere('correo','Like','%'.$this->search.'%')->paginate(10);
        return view('livewire.jefes.list-bosses',compact('jefes'));
    }
}
