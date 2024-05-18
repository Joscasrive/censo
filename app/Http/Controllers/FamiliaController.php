<?php

namespace App\Http\Controllers;

use App\Models\Boss;
use App\Models\Familia;
use App\Models\Manzana;
use Illuminate\Http\Request;

class FamiliaController extends Controller
{
    
    public function index()
    { 
      
        return view('familias.index');
    }

    
    
}
