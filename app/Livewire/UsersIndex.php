<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
  
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    #[Url(as:'busqueda')]
    public $search;
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $users = User::where('name','LIKE','%'.$this->search.'%')->orwhere('email','LIKE','%'.$this->search.'%')->paginate(10);
        
        return view('livewire.users-index',compact('users'));
    }
}
