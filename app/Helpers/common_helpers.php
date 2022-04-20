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

