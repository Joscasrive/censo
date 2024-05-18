<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clap extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','apellido','telefono','correo','ci','responsabilidad','img'];
    //Relacion uno a uno
    public function manzana(){
        return $this->hasOne('App\Models\Manzana');
        }
}
