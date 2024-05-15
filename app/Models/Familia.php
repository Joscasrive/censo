<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Familia extends Model
{
    use HasFactory;
    protected $fillable = ['nro_familiar','codigo_gas','manzana_id','boss_id'];
    //relacion uno a uno inversa
    public function boss(){
        return $this->belongsTo('App\Models\Boss');
    }
    //relacion uno a uno 
    public function manzana(){
        return $this->belongsTo('App\Models\Manzana');
    }
    //relacion muchos a muchos
    public function bombonas(){
        return $this->belongsToMany('App\Models\Bombona');
    }

}
