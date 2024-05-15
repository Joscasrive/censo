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
        $jefes = Boss::where('ci','LIKE','%'.$this->search.'%')->paginate(10);
        return view('livewire.list-bosses',compact('jefes'));
    }
}
