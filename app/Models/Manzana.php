<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manzana extends Model
{
    use HasFactory;
    //relacion uno a uno 
    public function familia(){
        return $this->hasOne('App\Models\Familia');
    }
}
