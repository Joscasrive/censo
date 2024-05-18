<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integrante extends Model
{
    protected $guarded = ['id','create_at','update_at'];
    use HasFactory;
    //relacion uno a muchos inversa
    public function familia(){
        return $this->belongsTo('App\Models\Familia');
    }
}
