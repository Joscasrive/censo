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
   
    protected $paginationTheme = 'bootstrap';
    #[Url(as:'busqueda')]
    public $search;
    public clapEdit $clapEdit;
    
    
    public $nombre;
    public $apellido; 
    public $telefono;
    public $correo;
    public $ci;
    public $responsabilidad;
    public $img;
    
    
    public function create(){
        $this->validate([
            'nombre' => 'required|max:45|regex:/^[a-zA-Z ]+$/',
            'apellido' => 'required|max:45|regex:/^[a-zA-Z ]+$/',
            'telefono' => 'required|max:15|regex:/^[0-9+]+$/',
            'correo' => 'required|max:45|unique:claps',
            'ci' => 'required|email|max:15|unique:claps|regex:/^[a-zA-Z0-9-]+$/',
            'responsabilidad' => 'required|in:MANZANERO,UBCH,FFM,UNAMUJER,ALIMENTACION,COMUNICADOR,PRODUCTIVO',
            'img' => 'nullable|max:1024|mimes:jpg,jpeg,png',
        ]);
   
       
    if ($this->img) {
          $file = uniqid(). '.'. $this->img->getClientOriginalExtension();
        $file = $this->img->storeAs('claps', $file);
        $this->img =$file;
       }
       if (Clap::where('responsabilidad', $this->responsabilidad)
    ->whereNotIn('responsabilidad', ['Manzanero']) 
    ->exists()) {
        $this->dispatch('alerta','El cargo seleccionado ya esta asiganado');
       }else{
        Clap::create($this->only(['nombre','apellido','telefono','correo','ci','responsabilidad','img']));
        $this->reset();
        $this->dispatch('alert','Miembro Agregado');
       }
       
    
       
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
         $claps = Clap::where('ci','Like','%'.$this->search.'%')->orWhere('correo','Like','%'.$this->search.'%')->paginate(10);
        return view('livewire.claps.clap-lista',compact('claps'));
    }
}

