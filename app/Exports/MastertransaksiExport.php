<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class MastertransaksiExport implements FromView, ShouldAutoSize, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function __construct($mastertrxcoas)
    {
        $this->mastertrxcoas = $mastertrxcoas;
    }

    public function view(): View
    {
        return view('mastertrx.export', [
            "mastertrxcoas" => $this->mastertrxcoas,
        ]);
    }

    public function registerEvents(): array
    {


        return [
            AfterSheet::class    => function (AfterSheet $event) {


                $row_count = sizeof($this->mastertrxcoas) + 2;
                $cellRange = 'A1:E' . $row_count;
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
