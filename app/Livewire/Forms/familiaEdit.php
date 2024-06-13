<?php

namespace App\Livewire\Forms;

use App\Models\Boss;
use App\Models\Familia;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\Component;
class familiaEdit extends Form
{
   public $nro_familiar,$codigo_gas,$manzana_id,$boss_id,$bombona,$cantidad;
   public $familiaId;

   public function edit($id){
    $familia = Familia::find($id);
    $this->familiaId = $familia->id;
    $this->nro_familiar=$familia->nro_familiar;
    $this->codigo_gas=$familia->codigo_gas;
    $this->manzana_id=$familia->manzana_id;
    $jefe = Boss::where('id', $familia->boss_id)->first();
    $this->boss_id = $jefe->ci;
    $this->bombona = $familia->bombonas->pluck('id')->first();
    $this->cantidad = $familia->bombonas->pluck('id')->count();
    
        }

    public function update(){
       
            $rules = [
                'nro_familiar' => ['required','numeric', 'unique:familias,nro_familiar,'.$this->familiaId],
                'codigo_gas' => ['max:20','regex:/^[a-zA-Z0-9]+$/','unique:familias,codigo_gas,'.$this->familiaId],
                'manzana_id' => ['required', 'max:45', 'exists:manzanas,id'],
                'boss_id' => ['required', 'max:45', 'exists:bosses,ci'],
                'bombona'=>['nullable','exists:bombonas,id']
            ];
            $messages = [];
            $attributes = [
                'nro_familiar' => 'número de familia',
                'codigo_gas' => 'código de gas',
                'manzana_id' => 'Manzana',
                'boss_id' => 'jefe de familia',
                'bombona'=>'bombona'
            ];
            $this->validate($rules, $messages, $attributes);
            $jefe = Boss::where('ci', $this->boss_id)->first();
            $this->boss_id = $jefe->id;
            $familia = Familia::find($this->familiaId);
            //validacion
            if($this->boss_id != $familia->boss_id){
                if (!$familia->where('boss_id',$this->boss_id)->exists()) {
                    $familia->update([
                        'nro_familiar' => $this->nro_familiar,
                        'codigo_gas' => $this->codigo_gas,
                        'manzana_id' => $this->manzana_id,
                        'boss_id' => $this->boss_id
                    ]);
                    $familia->bombonas()->detach($this->bombona);
                    $datos =[];
                    for ($i=0; $i < $this->cantidad ; $i++) { 
                       $datos[] = ['familia_id'=>$this->familiaId,
                                'bombona_id'=>$this->bombona];
                    }
                    DB::table('bombona_familia')->insert($datos);
            
              
                $this->reset();
                
    
            }else{
                return true;
            }
            }else{
                $familia->update([
                    'nro_familiar' => $this->nro_familiar,
                    'codigo_gas' => $this->codigo_gas,
                    'manzana_id' => $this->manzana_id,
                    'boss_id' => $this->boss_id
                ]);
                $familia->bombonas()->detach($this->bombona);
                    $datos =[];
                    for ($i=0; $i <$this->cantidad ; $i++) { 
                       $datos[]= ['familia_id'=>$this->familiaId,
                                'bombona_id'=>$this->bombona];
                    }
               
                    DB::table('bombona_familia')->insert($datos);
          
            $this->reset();  
            }
           
}
}
