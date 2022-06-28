<?php

namespace App\Imports;

use Ramsey\Uuid\Uuid;
use App\Models\Skrining;
use App\Models\SkriningDetail;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SkriningImportCovid implements ToModel, WithStartRow
{

    public function __construct($skrining_group_id)
    {
        $this->skrining_group_id = $skrining_group_id;
    }


    public function model(array $row)
    {
        // $skrining_id = Uuid::uuid1()->toString();
        $hlt_health_center_id =  'P35000000';
        $skrining_id = $this->skrining_group_id . "-" . $hlt_health_center_id . "-" . $row[20];
        if ($row[20] != null and $row[20] != "") {
            $count = Skrining::where('mdc_skrining_id', $skrining_id)->count();
            if ($count == 0) {
                $dataSkrining = [
                    'mdc_skrining_id' =>  $skrining_id,
                    'hlt_health_center_id' => $hlt_health_center_id,
                    'ptn_patient_id' => $row[2],
                    'ptn_patient_health_center_id' => '',
                    'is_active' => true,
                    'is_deleted' => false,
                    'created_by' => 'import-tools',
                    'created_on' => Date::excelToDateTimeObject($row[3]),
                    'updated_by' => 'import-tools',
                    'updated_on' => date("Y-m-d"),
                    'status' => 'Selesai',
                    'mdc_skrining_group_id' => $this->skrining_group_id,
                    'skrining_ref_id' => 'infokes',
                    'doctor_ref_id' => 'infokes',
                    'doctor_full_name' => 'infokes',
                ];

                Skrining::insert($dataSkrining);
            }


            if ($row[4] != "") {
                $demam =
                    [
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 20, // demam
                        "mdc_skrining_answers" => $row[4] == 0 ? 'ans-ya' : 'ans-no',
                        "mdc_skrining_answers_txt" => $row[4] == 0 ? 'Ya' : 'Tidak',

                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    ];
                SkriningDetail::insert($demam);
            }

            if ($row[5] != "") {
                $riwyawat_demam =

                    [
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 21, // riwayat demam
                        "mdc_skrining_answers" => $row[5] == 0 ? 'ans-ya' : 'ans-no',
                        "mdc_skrining_answers_txt" => $row[5] == 0 ? 'Ya' : 'Tidak',
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    ];
                SkriningDetail::insert($riwyawat_demam);
            }

            if ($row[6] != "") {
                $batuk =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 22, // batuk
                        "mdc_skrining_answers" => $row[6] == 0 ? 'ans-ya' : 'ans-no',
                        "mdc_skrining_answers_txt" => $row[6] == 0 ? 'Ya' : 'Tidak',

                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    );
                SkriningDetail::insert($batuk);
            }

            if ($row[7] != "") {
                $pilek =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 23, // pilek
                        "mdc_skrining_answers" => $row[7] == 0 ? 'ans-ya' : 'ans-no',
                        "mdc_skrining_answers_txt" => $row[7] == 0 ? 'Ya' : 'Tidak',

                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    );
                SkriningDetail::insert($pilek);
            }

            if ($row[8] != "") {
                $tenggorokan =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 24, // skt tenggorokan
                        "mdc_skrining_answers" => $row[8] == 0 ? 'ans-ya' : 'ans-no',
                        "mdc_skrining_answers_txt" => $row[8] == 0 ? 'Ya' : 'Tidak',

                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    );
                SkriningDetail::insert($tenggorokan);
            }

            if ($row[9] != "") {
                $sesak_nafas =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 25, // sesak nafas
                        "mdc_skrining_answers" => $row[9] == 0 ? 'ans-ya' : 'ans-no',
                        "mdc_skrining_answers_txt" => $row[9] == 0 ? 'Ya' : 'Tidak',

                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    );

                SkriningDetail::insert($sesak_nafas);
            }

            if ($row[10] != "") {
                $sakit_kepala =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 40, // sakit kepala
                        "mdc_skrining_answers" => $row[10] == 0 ? 'ans-ya' : 'ans-no',
                        "mdc_skrining_answers_txt" => $row[10] == 0 ? 'Ya' : 'Tidak',
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    );
                SkriningDetail::insert($sakit_kepala);
            }

            if ($row[11] != "") {
                $sakit_otot =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 26, // otot
                        "mdc_skrining_answers" => $row[11] == 0 ? 'ans-ya' : 'ans-no',
                        "mdc_skrining_answers_txt" => $row[11] == 0 ? 'Ya' : 'Tidak',
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    );
                SkriningDetail::insert($sakit_otot);
            }

            if ($row[12] != "") {
                $mual =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 41, // mual
                        "mdc_skrining_answers" => $row[12] == 0 ? 'ans-ya' : 'ans-no',
                        "mdc_skrining_answers_txt" => $row[12] == 0 ? 'Ya' : 'Tidak',
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    );
                SkriningDetail::insert($mual);
            }

            if ($row[13] != "") {
                $mata_berair =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 27, // mata berair
                        "mdc_skrining_answers" => $row[13] == 0 ? 'ans-ya' : 'ans-no',
                        "mdc_skrining_answers_txt" => $row[13] == 0 ? 'Ya' : 'Tidak',
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    );
                SkriningDetail::insert($mata_berair);
            }

            if ($row[14] != "") {
                $diare =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 42, // diare
                        "mdc_skrining_answers" => $row[14] == 0 ? 'ans-ya' : 'ans-no',
                        "mdc_skrining_answers_txt" => $row[14] == 0 ? 'Ya' : 'Tidak',
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d")
                    );
                SkriningDetail::insert($diare);
            }


            if ($row[16] != "") {
                $get_erat = tidakTahu($row[16]);
                $kontak_erat = array(
                    "mdc_skrining_id" => $skrining_id,
                    "mdc_skrining_map_id" => 28, // kontak erat
                    "mdc_skrining_answers" => $get_erat[0],
                    "mdc_skrining_answers_txt" => $get_erat[1],
                    'is_active' => true,
                    'is_deleted' => false,
                    'created_by' => 'import-tools',
                    'created_on' => date("Y-m-d"),
                    'updated_by' => 'import-tools',
                    'updated_on' => date("Y-m-d")
                );
                SkriningDetail::insert($kontak_erat);
            }


            if ($row[16] == 0 and $row[16] != null) {
                $tgl_kontak =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 29, // tgl kontak
                        "mdc_skrining_answers" => Date::excelToDateTimeObject($row[17]),
                        "mdc_skrining_answers_txt" => Date::excelToDateTimeObject($row[17]),
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d")
                    );
                SkriningDetail::insert($tgl_kontak);
            }

            if ($row[18] != null and  $row[18] != "") {
                $riwayat_kerja =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 30, // riwayat kerja
                        "mdc_skrining_answers" => $row[18] == 0 ? 'ans-ya' : 'ans-no',
                        "mdc_skrining_answers_txt" => $row[18] == 0 ? 'Ya' : 'Tidak',
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d")
                    );

                SkriningDetail::insert($riwayat_kerja);
            }

            if ($row[19] != null and $row[19] != "") {
                $riwayat_kerja =
                    $riwayat_kel_dekat =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 31, // riwayat kerja keluarga dekat
                        "mdc_skrining_answers" => $row[19] == 0 ? 'ans-ya' : 'ans-no',
                        "mdc_skrining_answers_txt" => $row[19] == 0 ? 'Ya' : 'Tidak',
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d")
                    );

                SkriningDetail::insert($riwayat_kel_dekat);
            }

            if ($row[21] == 0) {
                $luar_negri =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 32, // pergi ke luar negri
                        "mdc_skrining_answers" => $row[21] == 0 ? 'ans-ya' : 'ans-no',
                        "mdc_skrining_answers_txt" => $row[21] == 0 ? 'Ya' : 'Tidak',

                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d")
                    );
                SkriningDetail::insert($luar_negri);
            }

            if ($row[21] == 0) {
                $negara =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 33, // negara
                        "mdc_skrining_answers" => $row[22],
                        "mdc_skrining_answers_txt" => $row[22],
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d")
                    );
                SkriningDetail::insert($negara);
                $dari_tgl_negara =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 34, // dari tgl
                        "mdc_skrining_answers" => Date::excelToDateTimeObject($row[23]),
                        "mdc_skrining_answers_txt" => Date::excelToDateTimeObject($row[23]),
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d")
                    );
                SkriningDetail::insert($dari_tgl_negara);
                $sampe_tgl_negara =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 35, // sampe tgl 
                        "mdc_skrining_answers" => Date::excelToDateTimeObject($row[24]),
                        "mdc_skrining_answers_txt" => Date::excelToDateTimeObject($row[24]),
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d")
                    );
                SkriningDetail::insert($sampe_tgl_negara);
            }

            if ($row[25] == 0) {
                $keluar_kota =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 36, // pergi ke luar kota
                        "mdc_skrining_answers" => $row[25] == 0 ? 'ans-ya' : 'ans-no',
                        "mdc_skrining_answers_txt" => $row[25] == 0 ? 'Ya' : 'Tidak',
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d")
                    );
                SkriningDetail::insert($keluar_kota);
            }

            if ($row[25] == 0) {
                $kota =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 37, // kota
                        "mdc_skrining_answers" => $row[26],
                        "mdc_skrining_answers_txt" => $row[26],
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d")
                    );
                SkriningDetail::insert($kota);
                $dari_tgl_kota =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 38, // dari tgl 
                        "mdc_skrining_answers" => Date::excelToDateTimeObject($row[27]),
                        "mdc_skrining_answers_txt" => Date::excelToDateTimeObject($row[27]),
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d")
                    );
                SkriningDetail::insert($dari_tgl_kota);
                $sampe_tgl_kota =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 39, // sampe tgl 
                        "mdc_skrining_answers" => Date::excelToDateTimeObject($row[28]),
                        "mdc_skrining_answers_txt" => Date::excelToDateTimeObject($row[28]),
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d")
                    );
                SkriningDetail::insert($sampe_tgl_kota);
            }
        }
    }

    public function startRow(): int
    {
        return 5;
    }
}
