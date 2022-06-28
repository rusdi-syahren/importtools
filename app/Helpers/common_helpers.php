<?php

use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Month;

function rupiahFormat($data)
{
    $response =  "Rp. " . number_format($data, 0, ',', '.');
    return $response;
}

function TahunStr($data)
{
    $response =  $data . " Tahun";
    return $response;
}

function idGenerator($lastId = "")
{
    // $lastId = "TRK/20220131/00001";
    if ($lastId == "" or $lastId == null) {
        $number = 1;
    } else {
        $arrId = explode('/', $lastId);
        $number = $arrId[2];

        if ((string)date('Ymd') != (string)$arrId[1]) {
            $number = 1;
        } else {
            $number += 1;
        }
    }

    $prefix = "TRK/" . date('Ymd') . '/';

    $unique = str_pad($number, 5, "0", STR_PAD_LEFT);
    $unique = $prefix . $unique;

    return $unique;
}

function responseApi($data)
{

    return [
        'code' => isset($data['code']) ? $data['code'] : 200,
        'error' => isset($data['error']) ? $data['error'] : false,
        'message' => isset($data['message'])  ? $data['message'] : "",
        'data' => isset($data['data'])  ? $data['data'] : []
    ];
}

function tidakTahu($val)
{
    $res = [];
    if ($val == 0) {
        $res = ['ans-ya', 'Ya'];
    } elseif ($val = 1) {
        $res = ['ans-no', 'Tidak'];
    } else {
        $res = ["ans-tth", 'Tidak Tahu'];
    }

    return $res;
}

function alergi($data = array())
{

    $db_alergi = [
        "tidak" => ["ans-no", "Tidak"],
        "makanan_laut" => ["ans-mlt", "Makanan Laut"],
        "makanan laut" => ["ans-mlt", "Makanan Laut"],
        "kacang" => ["ans-kac", "Kacang-kacangan"],
        "kacang-kacangan" => ["ans-kac", "Kacang-kacangan"],
        "telur" => ["ans-tel", "Telur"],
        "debu" => ["ans-deb", "Debu"],
        "bulu" => ["ans-bul", "Bulu"],
        "bulu hewan" => ["ans-bul", "Bulu Hewan"],
        "tungau" => ["asn-tun", "Tungau"],
        "dll" => ["asn-dll", "Lainnya"]
    ];

    $list_answer = [];
    $list_answer_txt = [];
    foreach ($data as $row) {
        array_push($list_answer, $db_alergi[$row][0]);
        array_push($list_answer_txt, $db_alergi[$row][1]);
    }

    $str_answer = implode("|", $list_answer);
    $str_answer_txt = implode("|", $list_answer_txt);

    return [$str_answer, $str_answer_txt];
}

function alergiObat($data = array())
{


    $db_alergi = [
        "tidak" => ["ans-no", "Tidak"],
        "penisilin" => ["ans-pen", "Penisilin"],
        "sulfa" => ["ans-sul", "Sulfa"],
        "obat_nyeri" => ["ans-nyr", "Obat Nyeri"],
        "yodium" => ["ans-yod", "Yodium"],
        "nsaid" => ["ans-nsaid", "nsaid"],
        "dll" => ["asn-dll", "Lainnya"]
    ];

    $list_answer = [];
    $list_answer_txt = [];
    foreach ($data as $row) {
        array_push($list_answer, $db_alergi[$row][0]);
        array_push($list_answer_txt, $db_alergi[$row][1]);
    }

    $str_answer = implode("|", $list_answer);
    $str_answer_txt = implode("|", $list_answer_txt);

    return [$str_answer, $str_answer_txt];
}

function riwayatPenyakit($data = array())
{


    $db_alergi = [
        "tidak" => ["ans-no", "Tidak"],
        "asma" => ["ans-asm", "Riwayat Asma"],
        "kejang" => ["ans-kej", "Kejang"],
        "diabetes" => ["ans-dia", "Diabetes"],
        "transfusi" => ["ans-tran", "Transfusi"],
        "cidera" => ["ans-cid", "Cidera"],
        "cidera berat" => ["ans-cid", "Cidera Berat"],
        "kelainan" => ["ans-kel", "Kelainan"],
        "kelainan bawaan" => ["ans-kel", "Kelainan Bawaan"],
        "hipertensi" => ["ans-hip", "Riwayat hipertensi"],
        "tb" => ["ans-tub", "Riwayat TB"],
        "pingsan" => ["ans-pin", "Pingsan"],
        "dll" => ["asn-dll", "Lainnya"]
    ];

    $list_answer = [];
    $list_answer_txt = [];
    foreach ($data as $row) {
        array_push($list_answer, $db_alergi[$row][0]);
        array_push($list_answer_txt, $db_alergi[$row][1]);
    }

    $str_answer = implode("|", $list_answer);
    $str_answer_txt = implode("|", $list_answer_txt);

    return [$str_answer, $str_answer_txt];
}


function keluhanSaatIni($data = array())
{
    $db_alergi = [
        "tidak" => ["ans-no", "Tidak"],
        "batuk" => ["ans-btk", "Batuk"],
        "demam" => ["ans-dmm", "Demam"],
        "nyeri_tenggorokan" => ["ans-tgg", "Nyeri Tenggorokan"],
        "tenggorokan" => ["ans-tgg", "Nyeri Tenggorokan"],
        "sesak" => ["ans-ssk", "Sesak"],
        "pilek" => ["ans-plk", "Pilek"],
        "diare" => ["ans-dre", "Diare"],
        "sakit_kepala" => ["ans-skl", "Sakit Kepala"],
        "sakit kepala" => ["ans-skl", "Sakit Kepala"],
        "nyeri_otot" => ["ans-not", "Nyeri Otot"],
        "otot sendi" => ["ans-not", "Otot Sendi"],
        "nyeri_ulu_hati" => ["ans-plk", "Nyeri Ulu Hati"],
        "ulu hati" => ["ans-plk", "Nyeri Ulu Hati"],
        "pingsan" => ["ans-pin", "Pingsan"],
        "gatal" => ["ans-gtl", "Gatal"],
        "kutu" => ["ans-ktu", "Kutu"],
        "dll" => ["ans-dll", "Lainnya"]
    ];

    $list_answer = [];
    $list_answer_txt = [];
    foreach ($data as $row) {
        array_push($list_answer, $db_alergi[$row][0]);
        array_push($list_answer_txt, $db_alergi[$row][1]);
    }

    $str_answer = implode("|", $list_answer);
    $str_answer_txt = implode("|", $list_answer_txt);

    return [$str_answer, $str_answer_txt];
}

function imunisasiDasar($data = array())
{
    $db_alergi = [
        "tidak" => ["ans-no", "Tidak"],
        "hepatitis_lahir" => ["ans-hel", "Hepatitis Lahir"],
        "hepatitisb" => ["ans-hel", "Hepatitis B"],
        "dpthibhepatitisb" => ["ans-hel", "Dpthibhepatitisb"],
        "campak" => ["ans-cam", "Campak"],
        "bcg" => ["ans-bcg", "BCG"],
        "dpt" => ["ans-dpt", "DPT"],
        "dtp" => ["ans-dpt", "DPT"],
        "polio" => ["ans-pol", "POLIO"],
    ];

    $list_answer = [];
    $list_answer_txt = [];
    foreach ($data as $row) {
        array_push($list_answer, $db_alergi[$row][0]);
        array_push($list_answer_txt, $db_alergi[$row][1]);
    }

    $str_answer = implode("|", $list_answer);
    $str_answer_txt = implode("|", $list_answer_txt);

    return [$str_answer, $str_answer_txt];
}

function riwayatKesKel($data = array())
{
    $db_alergi = [
        "tb" => ["ans-tub", "Riwayat TB"],
        "diabetes" => ["ans-dia", "Riwayat diabetes"],
        "dm" => ["ans-dia", "Riwayat diabetes"],
        "hepatitis" => ["ans-hep", "Hepatitis"],
        "asma" => ["ans-asm", "Riwayat asma"],
        "jantung" => ["ans-jan", "Jantung"],
        "hipertensi" => ["ans-hip", "Riwayat hipertensi"],
        "kanker" => ["ans-kan", "Kanker"],
        "kangker tumor" => ["ans-kan", "Kangker Tumor"],
        "darah" => ["ans-dar", "Darah"],
        "kelainan darah" => ["ans-dar", "Kelainan Darah"],
        "dll" => ["ans-dll", "Lainnya"]
    ];

    $list_answer = [];
    $list_answer_txt = [];
    foreach ($data as $row) {
        array_push($list_answer, $db_alergi[$row][0]);
        array_push($list_answer_txt, $db_alergi[$row][1]);
    }

    $str_answer = implode("|", $list_answer);
    $str_answer_txt = implode("|", $list_answer_txt);

    return [$str_answer, $str_answer_txt];
}

function riwayatKesEmosional($data = array())
{
    $db_alergi = [
        "tidak" => ["ans-no", "Tidak"],
        "depresi" => ["ans-dep", "Depresi"],
        "cemas" => ["ans-cem", "Cemas"],
        "hiperaktif" => ["ans-hif", "Hiperaktif"],
        "antisosial" => ["ans-ant", "Anti Sosial"],
        "agresif" => ["ans-agr", "Agresif"],
        "dll" => ["ans-dll", "Lainnya"]
    ];

    $list_answer = [];
    $list_answer_txt = [];
    foreach ($data as $row) {
        array_push($list_answer, $db_alergi[$row][0]);
        array_push($list_answer_txt, $db_alergi[$row][1]);
    }

    $str_answer = implode("|", $list_answer);
    $str_answer_txt = implode("|", $list_answer_txt);

    return [$str_answer, $str_answer_txt];
}
