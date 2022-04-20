<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class JurnalExport implements FromView, ShouldAutoSize, WithEvents
{

    public function __construct($jurnals)
    {
        $this->jurnals = $jurnals;
    }

    public function view(): View
    {
        return view('jurnal.export', [
            "jurnals" => $this->jurnals,
        ]);
    }

    public function registerEvents(): array
    {


        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $row_count = sizeof($this->jurnals) + 2;
                $cellRange = 'A1:H' . $row_count;
                $styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ]
                    ]
                ];
                $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($styleArray);
            },
        ];
    }
}
