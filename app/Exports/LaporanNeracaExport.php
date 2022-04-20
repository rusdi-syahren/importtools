<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LaporanNeracaExport implements FromView, ShouldAutoSize, WithEvents
{

    public $trip;

    public function __construct($list_aktiva, $list_pasiva, $hitung_neraca)
    {
        $this->list_aktiva = $list_aktiva;
        $this->list_pasiva = $list_pasiva;
        $this->hitung_neraca = $hitung_neraca;
    }

    public function view(): View
    {

        return view('laporan.exportneraca', [
            "aktiva" => $this->list_aktiva,
            "pasiva" =>  $this->list_pasiva,
            'hitung_neraca' =>  $this->hitung_neraca
        ]);
    }

    public function registerEvents(): array
    {


        // dd(collect($this->list_aktiva));




        return [
            AfterSheet::class    => function (AfterSheet $event) {

                $count_aktiva = collect($this->list_aktiva)->map(fn ($ak) => +count($ak));
                $count_pasiva = collect($this->list_pasiva)->map(fn ($pa) => +count($pa));
                $aktiva = count($this->list_aktiva) * 3;
                $pasiva = count($this->list_pasiva) * 3;
                $total_row = $count_aktiva->sum() + $count_pasiva->sum() + $aktiva + $pasiva + 3;
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
