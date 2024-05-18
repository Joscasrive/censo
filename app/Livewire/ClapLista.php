<?php

namespace App\Livewire;

use App\Livewire\Forms\clapEdit;
use App\Models\Clap;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ClapLista extends Component
{  
    use WithFileUploads;
    use WithPagination;
    #[Rule('required|max:45')]
    public $nombre;
    #[Rule('required|max:45')]
    public $apellido; 
    #[Rule('required|max:15')]
    public $telefono;
    #[Rule('required|max:45|unique:claps')]
    public $correo;
    #[Rule('required|max:15|unique:claps')]
    public $ci;
    #[Rule('required|in:MANZANERO,UBCH,FFM,UNAMUJER,ALIMENTACION,COMUNICADOR,PRODUCTIVO')]
    public $responsabilidad;
    #[Rule('nullable|max:1024|mimes:jpg,jpeg,png')]
    public $img;
    protected $paginationTheme = 'bootstrap';
    #[Url(as:'busqueda')]
    public $search;
    public clapEdit $clapEdit;
    
    public function create(){
    $this->validate();
    if ($this->img) {
          $file = uniqid(). '.'. $this->img->getClientOriginalExtension();
        $file = $this->img->storeAs('claps', $file);
        $this->img =$file;
       }
   $clap = Clap::create($this->only(['nombre','apellido','telefono','correo','ci','responsabilidad','img']));
    
    $this->reset();
    $this->dispatch('alert','Miembro Agregado');
    }
    #[On('delete')]
    public function delete($id){

        $clap = Clap::find($id);
        if($clap->img){
            Storage::delete($clap->img);
        }
        $clap->delete();
        
    }
    public function edit($id){
        $this->clapEdit->edit($id);
    }
public function update(){
    $this->clapEdit->update();
    $this->dispatch('alert','Dato Actualizado');
}
    public function closeModal(){
        $this->resetValidation();
      
    }

    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
         $claps = Clap::where('ci','Like','%'.$this->search.'%')->paginate(1);
        return view('livewire.claps.clap-lista',compact('claps'));
    }
}
