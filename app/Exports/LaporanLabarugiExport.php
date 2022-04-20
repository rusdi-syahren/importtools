<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LaporanLabarugiExport implements FromView, ShouldAutoSize, WithEvents
{


    public function __construct($list_laba_rugi, $hitung_laba_rugi)
    {
        $this->list_laba_rugi = $list_laba_rugi;
        $this->hitung_laba_rugi = $hitung_laba_rugi;
    }

    public function view(): View
    {

        return view('laporan.exportlabarugi', [
            "list_laba_rugi" => $this->list_laba_rugi,
            'hitung_laba_rugi' =>  $this->hitung_laba_rugi
        ]);
    }

    public function registerEvents(): array
    {

        return [
            AfterSheet::class    => function (AfterSheet $event) {

                $count_laba = collect($this->list_laba_rugi)->map(fn ($ak) => +count($ak));

                $laba = count($this->list_laba_rugi) * 2;
                $total_row = $count_laba->sum()  + $laba  + 2;
                $cellRange = 'A1:C' . $total_row;
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
