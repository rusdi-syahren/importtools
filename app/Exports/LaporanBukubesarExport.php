<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LaporanBukubesarExport implements FromView, ShouldAutoSize, WithEvents
{


    public function __construct($bukubesars, $priode)
    {
        $this->bukubesars = $bukubesars;
        $this->priode = $priode;
    }

    public function view(): View
    {

        return view('laporan.exportbukubesar', [
            "bukubesars" => $this->bukubesars,
            "priode" => $this->priode
        ]);
    }

    public function registerEvents(): array
    {


        return [
            AfterSheet::class    => function (AfterSheet $event) {

                $count_jurnal = $this->bukubesars->map(fn ($buk) => +count($buk->jurnals));

                $row_count = (sizeof($this->bukubesars) * 2) + $count_jurnal->sum() + 1;
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
