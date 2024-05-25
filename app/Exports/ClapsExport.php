<?php

namespace App\Exports;

use App\Models\Clap;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ClapsExport implements FromCollection, ShouldAutoSize, WithHeadings,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Clap::all()->map(function ($clap) {
            return [
                
                'ci' => $clap->ci,
                'nombre' => $clap->nombre,
                'apellido'=> $clap->apellido,
                'telefono'=>$clap->telefono,
                'correo'=>$clap->correo,
                'responsabilidad'=>$clap->responsabilidad,
                
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Ci',
            'Nombre',
            'Apellido',
            'Teléfono',
            'Correo Electrónico',
            'Responsabilidad'
        ];
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:F1')->applyFromArray([
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
    }
}
