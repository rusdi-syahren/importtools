<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class PenyusutanasetExport implements FromView, ShouldAutoSize, WithEvents
{

    public function __construct($penyusutans, $month, $year)
    {
        $this->penyusutans = $penyusutans;
        $this->month = $month;
        $this->year = $year;
    }

    public function view(): View
    {
        return view('penyusutanaset.export', [
            "penyusutans" => $this->penyusutans,
            "month" => $this->month,
            "year" => $this->year
        ]);
    }

    public function registerEvents(): array
    {


        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $row_count = sizeof($this->penyusutans) + 2;
                $cellRange = 'A1:L' . $row_count;
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
