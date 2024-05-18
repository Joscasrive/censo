<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manzana extends Model
{
    use HasFactory;
    //relacion uno a aun inversa
    public function clap(){
    return $this->belongsTo('App\Models\Clap');
    }
    //relacion uno a muchos 
    public function familias(){
        return $this->hasMany('App\Models\Familia');
    }
}
