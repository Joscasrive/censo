<?php

namespace App\Exports;

use App\Models\Boss;
use App\Models\Integrante;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class GasExport implements FromCollection, ShouldAutoSize, WithHeadings,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Boss::all()->map(function ($boss) {
            return [
                'municipio'=>'Jimenez',
                'parroquia'=>'Juan Bautista Rodriguez',
                'jefe de familia'=>$boss->nombres." ".$boss->apellidos,
                'ci' => $boss->ci,
                'telefono'=>$boss->telefono,
                'miembros'=>Integrante::where('familia_id',$boss->familia->id)->count(),
                'bombona_id'=>$boss->familia->bombonas->pluck('tipo')->first(),
                'cantidad'=>$boss->familia->bombonas->pluck('id')->count()
               
                
            ];
        });
    }
    public function headings(): array
    {
        return [
            'Municipio',
            'Parroquia',
            'Jefe de Familia',
            'Ci',
            'Telefono',
            'Miembros',
            'Tipo de Bombona',
            'Cantidad de Bombonas'
           
        ];
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:H1')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);
        $sheet->getStyle('A2:H'. $sheet->getHighestRow())->applyFromArray([
            'font' => [
                'bold' => false,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);
    }
}
