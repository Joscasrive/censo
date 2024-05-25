<?php

namespace App\Http\Controllers;

use App\Exports\ClapsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\IntegrantesExport;
class ExportExel extends Controller
{
    public function exportIntegrante(){
        return Excel::download(new IntegrantesExport, 'integrantes.xlsx');
       
        
    }
    public function exportClaps(){
        return Excel::download(new ClapsExport, 'estructura.xlsx');
       
        
    }
}
