<?php

namespace App\Imports;

use Ramsey\Uuid\Uuid;
use App\Models\Skrining;
use Illuminate\Support\Arr;
use App\Models\SkriningDetail;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SkriningImportPemKes implements ToModel, WithStartRow
{

    public function __construct($skrining_group_id)
    {
        $this->skrining_group_id = $skrining_group_id;
    }


    public function model(array $row)
    {
        // $skrining_id = Uuid::uuid1()->toString();
        $hlt_health_center_id =  'P35000000';
        $skrining_id = $this->skrining_group_id . "-" . $hlt_health_center_id . "-" . $row[1];
        if ($row[1] != null) {
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

            if ($row[5] != "") {
                $alergi =
                    [
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 1, // alergi
                        "mdc_skrining_answers" => "ans-dll",
                        "mdc_skrining_answers_txt" => $row[5],
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    ];
                SkriningDetail::insert($alergi);
            } else {

                $clean_alergi = str_replace(['"', '[', ']'], ['', '', ''], $row[4]);
                $get_alergi = alergi(explode(',', $clean_alergi));
                $alergi =
                    [
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 1, // alergi
                        "mdc_skrining_answers" => $get_alergi[0],
                        "mdc_skrining_answers_txt" => $get_alergi[1],
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    ];
                SkriningDetail::insert($alergi);
            }

            if ($row[7] != "") {
                $alergi_obt =

                    [
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 2, // alergi obat
                        "mdc_skrining_answers" => "ans-dll",
                        "mdc_skrining_answers_txt" => $row[7],
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    ];
                SkriningDetail::insert($alergi_obt);
            } else {
                $clean_alergi_obat = str_replace(['"', ']', '['], ['', '', ''], $row[6]);
                $get_alergi_obt = alergiObat(explode(',', $clean_alergi_obat));
                $alergi_obt =

                    [
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 2, // alergi obat
                        "mdc_skrining_answers" => $get_alergi_obt[0],
                        "mdc_skrining_answers_txt" => $get_alergi_obt[1],
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    ];
                SkriningDetail::insert($alergi_obt);
            }

            if ($row[11] != "") {

                $riw_penyakit =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 3, // riwayat penyakit
                        "mdc_skrining_answers" => "ans-dll",
                        "mdc_skrining_answers_txt" => $row[11],
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    );
                SkriningDetail::insert($riw_penyakit);
            } else {

                $clean_riwayat_penyakit = str_replace(['"', ']', '['], ['', '', ''], $row[8]);
                $get_riwayat_penyakit = riwayatPenyakit(explode(',', $clean_riwayat_penyakit));

                $riw_penyakit_notes = $get_riwayat_penyakit[1];
                if ($row[9] != "") {
                    $riw_penyakit_notes .= " | " . $row[9];
                }
                if ($row[10] != "") {
                    $riw_penyakit_notes .= " | " . $row[10];
                }
                $riw_penyakit =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 3, // riwayat penyakit
                        "mdc_skrining_answers" => $get_riwayat_penyakit[0],
                        "mdc_skrining_answers_txt" => $riw_penyakit_notes,
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    );
                SkriningDetail::insert($riw_penyakit);
            }

            if ($row[13] != "") {

                $keluhan =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 4, // keluhan saat ini
                        "mdc_skrining_answers" => "ans-dll",
                        "mdc_skrining_answers_txt" => $row[13],
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    );
                SkriningDetail::insert($keluhan);
            } else {
                $clean_keluhan = str_replace(['"', ']', '['], ['', '', ''], $row[12]);
                $get_keluhan = keluhanSaatIni(explode(',', $clean_keluhan));
                $keluhan =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 4, // keluhan saat ini
                        "mdc_skrining_answers" => $get_keluhan[0],
                        "mdc_skrining_answers_txt" => $get_keluhan[1],
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    );
                SkriningDetail::insert($keluhan);
            }


            if ($row[14] != "") {

                $clean_imun_dasar = str_replace(['"', ']', '['], ['', '', ''], $row[14]);
                $get_imun_dasar = imunisasiDasar(explode(',', $clean_imun_dasar));
                $imun_dasar =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 6, // imunisasi dasar
                        "mdc_skrining_answers" => $get_imun_dasar[0],
                        "mdc_skrining_answers_txt" => $get_imun_dasar[1],
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    );
                SkriningDetail::insert($imun_dasar);
            }



            if ($row[15] != "") {

                $keluhan =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 8, // imunisasi dt 1
                        "mdc_skrining_answers" => $row[15] == 'ya' ? 'ans-ya' : 'ans-no',
                        "mdc_skrining_answers_txt" => $row[15] == 'ya' ? 'Ya' : 'Tidak',
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    );
                SkriningDetail::insert($keluhan);
            }
            if ($row[16] != "") {


                $keluhan =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 7, // imunisasi cm 1
                        "mdc_skrining_answers" => $row[16] == 'ya' ? 'ans-ya' : 'ans-no',
                        "mdc_skrining_answers_txt" => $row[16] == 'ya' ? 'Ya' : 'Tidak',
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    );
                SkriningDetail::insert($keluhan);
            }
            if ($row[17] != "") {


                $keluhan =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 9, // imunisasi cm 2   
                        "mdc_skrining_answers" => $row[17] == 'ya' ? 'ans-ya' : 'ans-no',
                        "mdc_skrining_answers_txt" => $row[17] == 'ya' ? 'Ya' : 'Tidak',
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    );
                SkriningDetail::insert($keluhan);
            }
            if ($row[18] != "") {


                $keluhan =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 10, // imunisasi td 5
                        "mdc_skrining_answers" => $row[18] == 'ya' ? 'ans-ya' : 'ans-no',
                        "mdc_skrining_answers_txt" => $row[18] == 'ya' ? 'Ya' : 'Tidak',
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    );
                SkriningDetail::insert($keluhan);
            }

            if ($row[20] != "") {
                $riwayatKesKel =

                    [
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 11, // alergi obat
                        "mdc_skrining_answers" => "ans-dll",
                        "mdc_skrining_answers_txt" => $row[20],
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    ];
                SkriningDetail::insert($riwayatKesKel);
            } else {
                $riwayat_kes_kel = str_replace(['"', ']', '['], ['', '', ''], $row[19]);
                $getKesKel =    riwayatKesKel(explode(',', $riwayat_kes_kel));
                $riwayatKesKel =

                    [
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 11, // alergi obat
                        "mdc_skrining_answers" => $getKesKel[0],
                        "mdc_skrining_answers_txt" => $getKesKel[1],
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    ];
                SkriningDetail::insert($riwayatKesKel);
            }
            if ($row[21] != "") {


                $merokok =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 12, // merokok
                        "mdc_skrining_answers" => $row[21] == 'ya' ? 'ans-ya' : 'ans-no',
                        "mdc_skrining_answers_txt" => $row[21] == 'ya' ? 'Ya' : 'Tidak',
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    );
                SkriningDetail::insert($merokok);
            }
            if ($row[22] != "") {


                $minumAlkohol =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 13, // iminum alkohol
                        "mdc_skrining_answers" => $row[22] == 'ya' ? 'ans-ya' : 'ans-no',
                        "mdc_skrining_answers_txt" => $row[22] == 'ya' ? 'Ya' : 'Tidak',
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    );
                SkriningDetail::insert($minumAlkohol);
            }

            if ($row[24] != "") {
                $riwEmosional =

                    [
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 14, // emosional
                        "mdc_skrining_answers" => "ans-dll",
                        "mdc_skrining_answers_txt" => $row[24],
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    ];
                SkriningDetail::insert($riwEmosional);
            } else {
                $riwkesEmosional = str_replace(['"', '{', '}', "[", "]"], ['', '', '', '', ''], $row[23]);
                $getRiwEmo = riwayatKesEmosional(explode(',', $riwkesEmosional));
                $riwEmosional =

                    [
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 14, // riwkesEmosional
                        "mdc_skrining_answers" =>  $getRiwEmo[0],
                        "mdc_skrining_answers_txt" => $getRiwEmo[1],
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    ];
                SkriningDetail::insert($riwEmosional);
            }

            if ($row[37] != "") {


                $kacaMata =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 15, //kacamata
                        "mdc_skrining_answers" => $row[37] == 'ya' ? 'ans-ya' : 'ans-no',
                        "mdc_skrining_answers_txt" => $row[37] == 'ya' ? 'Ya' : 'Tidak',
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    );
                SkriningDetail::insert($kacaMata);
            }
            if ($row[38] != "") {


                $butaWarna =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 16, //buta warna
                        "mdc_skrining_answers" => $row[38] == 'ya' ? 'ans-ya' : 'ans-no',
                        "mdc_skrining_answers_txt" => $row[38] == 'ya' ? 'Ya' : 'Tidak',
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    );
                SkriningDetail::insert($butaWarna);
            }
            if ($row[39] != "") {


                $jarakJauh =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 17, // tdk bisa liat jarak jauh
                        "mdc_skrining_answers" => $row[39] == 'ya' ? 'ans-ya' : 'ans-no',
                        "mdc_skrining_answers_txt" => $row[39] == 'ya' ? 'Ya' : 'Tidak',
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    );
                SkriningDetail::insert($jarakJauh);
            }
            if ($row[40] != "") {


                $jarakJauh =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 18, // tdk bisa dipanggil
                        "mdc_skrining_answers" => $row[40] == 'ya' ? 'ans-ya' : 'ans-no',
                        "mdc_skrining_answers_txt" => $row[40] == 'ya' ? 'Ya' : 'Tidak',
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    );
                SkriningDetail::insert($jarakJauh);
            }
            if ($row[41] != "") {


                $jarakJauh =
                    array(
                        "mdc_skrining_id" => $skrining_id,
                        "mdc_skrining_map_id" => 19, // tdk bisa dipanggil dng jelas
                        "mdc_skrining_answers" => $row[41] == 'ya' ? 'ans-ya' : 'ans-no',
                        "mdc_skrining_answers_txt" => $row[41] == 'ya' ? 'Ya' : 'Tidak',
                        'is_active' => true,
                        'is_deleted' => false,
                        'created_by' => 'import-tools',
                        'created_on' => date("Y-m-d"),
                        'updated_by' => 'import-tools',
                        'updated_on' => date("Y-m-d"),
                    );
                SkriningDetail::insert($jarakJauh);
            }
        }
    }

    public function startRow(): int
    {
        return 4;
    }
}
