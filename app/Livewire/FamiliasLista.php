<?php

namespace App\Livewire;

use App\Livewire\Forms\familiaEdit;
use App\Models\Bombona;
use App\Models\Boss;
use App\Models\Familia;
use App\Models\Manzana;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class FamiliasLista extends Component
{
    use WithPagination;
    public $nro_familiar,$codigo_gas,$manzana_id,$boss_id,$bombona,$cantidad;
    protected $paginationTheme = 'bootstrap';
    
    #[Url(as:'busqueda')]
    public $search;
    public familiaEdit $familiaEdit;
    public $familiaId;


    public function create(){
        $rules = [
            'nro_familiar' => ['required', 'unique:familias','numeric'],
            'codigo_gas' => ['max:20', 'unique:familias','regex:/^[a-zA-Z0-9]+$/'],
            'manzana_id' => ['required','max:45','exists:manzanas,id'],
            'boss_id' => ['required','max:45', 'exists:bosses,ci'],
            'bombona'=>['nullable','exists:bombonas,id'],
            'cantidad'=>['numeric']
            
        ];
        $messages = [];
        $attributes = [
            'nro_familiar' => 'número de familia',
            'codigo_gas' => 'código de gas',
            'manzana_id' => 'Manzana',
            'boss_id' => 'jefe de familia'
        ];
        $this->validate($rules, $messages, $attributes);
        $jefe = Boss::where('ci', $this->boss_id)->first();
        $this->boss_id = $jefe->id;
        if (!Familia::where('boss_id',$this->boss_id)->exists()) {
            $familia = Familia::create([
                'nro_familiar' => $this->nro_familiar,
                'codigo_gas' => $this->codigo_gas,
                'manzana_id' => $this->manzana_id,
                'boss_id' => $this->boss_id
            ]);
            $datos = [];
            for ($i = 0; $i < $this->cantidad; $i++) {
                $datos[] = [
                    'familia_id' => $familia->id,
                    'bombona_id' => $this->bombona,
                ];
            }
            
            DB::table('bombona_familia')->insert($datos);
    
            $this->reset();
            $this->dispatch('alert', 'Grupo Familiar Creado'); 
        }else{
            $this->dispatch('alerta', 'El jefe de familia ya tiene un grupo familiar');
        }

       
    }

   public function edit($id){
        $this->familiaEdit->edit($id);
   }

   public function update(){
   if( $this->familiaEdit->update() == true){
   $this->dispatch('alerta','El jefe de familia ya tiene un grupo familiar');
}else{
    $this->dispatch('alert', 'Grupo Familiar Actualizado'); 
}
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
        $bombonas =Bombona::pluck('tipo','id')->toArray();
        $manzanas = Manzana::pluck('nombre','id')->toArray();
        $familias = Familia::where('nro_familiar','Like','%'.$this->search.'%')
        ->orWhere('codigo_gas', 'like', '%'. $this->search. '%')
        ->paginate(20);
       
        return view('livewire.familias.familia-lista',compact('familias','manzanas','bombonas'));
    }
}
