<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClapController extends Controller
{
    public function index(){
        return view('claps.index');
    }
}
