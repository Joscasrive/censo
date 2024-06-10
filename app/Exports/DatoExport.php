<?php

namespace App\Exports;

use App\Models\Dato;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DatoExport implements FromCollection, ShouldAutoSize, WithHeadings,WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Dato::all()->map(function($dato){
            return [
                'codigo' => $dato->codigo,
                'nombre' => $dato->nombre,
                'municipio' => $dato->municipio,
                'parroquia' => $dato->parroquia,
                'rif' => $dato->rif,
                'clap' => $dato->clap,
                'correo' => $dato->correo,
                'misiones' => $dato->misiones,
                'centro' => $dato->centro,
                'norte' => $dato->norte,
                'sur' => $dato->sur,
                'este' => $dato->este,
                'oeste' => $dato->oeste,
                
                ];
        });
    }

    public function headings(): array
    {
        return [
            'Codigo',
            'Nombre',
            'Municipio',
            'Parroquia',
            'Rif',
            'Clap',
            'Correo',
            'Misiones',
            'Centro',
            'Norte',
            'Sur',
            'Este',
            'Oeste'];
           
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:M1')->applyFromArray([
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
        $sheet->getStyle('A2:M'. $sheet->getHighestRow())->applyFromArray([
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
