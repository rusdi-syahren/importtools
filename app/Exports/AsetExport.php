<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;

class AsetExport implements FromView, ShouldAutoSize, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function __construct($asets)
    {
        $this->asets = $asets;
    }

    public function view(): View
    {

        return view('aset.export', [
            "asets" => $this->asets,
        ]);
    }

    public function registerEvents(): array
    {


        return [
            AfterSheet::class    => function (AfterSheet $event) {

                $row_count = sizeof($this->asets) + 2;
                $cellRange = 'A1:I' . $row_count;
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
