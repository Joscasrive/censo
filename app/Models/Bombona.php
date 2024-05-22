<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bombona extends Model
{
    use HasFactory;
    protected $fillable =['tipo'];
    //relacion muchos a muchos 
    public function familias(){
        return $this->belongsToMany('App\Models\Familia');
    }
}
