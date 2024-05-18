<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManzanaController extends Controller
{
   public function index(){
    return view('manzanas.index');
   }
}
