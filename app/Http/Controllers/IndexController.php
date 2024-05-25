<?php

namespace App\Http\Controllers;

use App\Models\Boss;
use App\Models\Clap;
use App\Models\Familia;
use App\Models\Integrante;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $familias = Familia::count();
        $integrates=Integrante::count();
        $responsables = Clap::count();
        $jefes=Boss::count();
        return view('dashboard',compact('familias','integrates','jefes','responsables'));
    }
    
}
