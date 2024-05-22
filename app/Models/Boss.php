<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boss extends Model
{
    use HasFactory;
    protected $fillable = ['nombres','apellidos','ci','correo','fecha_nacimiento','sexo','codigo','serial','telefono','mercado'];

    //relacion uno a uno 
    public function familia(){
        return $this->hasOne('App\Models\Familia');
    }
}
