<?php

namespace App\Http\Controllers;

use App\Exports\ClapsExport;
use App\Exports\DatoExport;
use App\Exports\GasExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\IntegrantesExport;
class ExportExel extends Controller
{
    public function exportIntegrante(){
        $fecha = date('Y-m-d');
        return Excel::download(new IntegrantesExport, 'integrantes'.$fecha.'.xlsx');
       
        
    }
    public function exportClaps(){
        $fecha = date('Y-m-d');
        return Excel::download(new ClapsExport, 'estructura'.$fecha.'.xlsx');
       
        
    }
    public function exportBombonas(){
        //Obtener fecha actual
        $fecha = date('Y-m-d');
        return Excel::download(new GasExport, 'gaslara'.$fecha.'.xlsx');
       
        
    }
    public function exportDatos(){
        //Obtener fecha actual
        $fecha = date('Y-m-d');
        return Excel::download(new DatoExport, 'datos'.$fecha.'.xlsx');
       
        
    }
}
