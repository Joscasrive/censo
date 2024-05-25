<?php

namespace App\Exports;

use App\Models\Integrante;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class IntegrantesExport implements FromCollection, ShouldAutoSize, WithHeadings,WithStyles
{
    public function collection()
    {
        return Integrante::all()->map(function ($integrante) {
            return [
                'manzana'=>$integrante->familia->manzana->nombre,
                'nro_familiar' => $integrante->familia->nro_familiar,
                'ci' => $integrante->ci,
                'nombres' => $integrante->nombres,
                'apellidos'=> $integrante->apellidos,
                'sexo' => $integrante->sexo,
                'fecha_nacimiento' => $integrante->fecha_nacimiento,
                'telefono'=>$integrante->telefono,
                'tipo_persona'=>$integrante->tipo_persona,
                'correo'=>$integrante->correo,
                'codigo' => $integrante->codigo,
                'serial' => $integrante->serial,
                'status'=>$integrante->status,
                'mercado'=>$integrante->familia->boss->mercado,
                'nro_integrante_familia'=>Integrante::where('familia_id',$integrante->familia_id)->count(),
                'observacion' => $integrante->observacion
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Manzana',
            'Nro. Familiar',
            'CI',
            'Nombres',
            'Apellidos',
            'Sexo',
            'Fecha de Nacimiento',
            'Teléfono',
            'Tipo de Persona',
            'Correo Electrónico',
            'Código',
            'Serial',
            'Embarazada=2',
            'Mercado',
            'Nro. Integrantes de la Familia',
            'Observación'
        ];
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:O1')->applyFromArray([
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
