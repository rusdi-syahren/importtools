<?php

namespace App\Http\Controllers;

use App\Imports\SkriningImport;
use App\Imports\SkriningImportCovid;
use App\Imports\SkriningImportPemKes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;



class PelayananMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pelayanan.index');
    }



    public function skrining(Request $request)
    {



       
        // menangkap file excel
        $file = $request->file('skrining_file');
        $skrining_group_id = $request->post('skrining_group_id');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_kelompok di dalam folder public
        $file->move('files/skrining', $nama_file);

        DB::beginTransaction();

        try {
            // import data

            if ($skrining_group_id == "skn-covid") {
                Excel::import(new SkriningImportCovid($skrining_group_id), public_path('/files/skrining/' . $nama_file));
            } elseif ($skrining_group_id == "skn-pem-kes") {
                Excel::import(new SkriningImportPemKes($skrining_group_id), public_path('/files/skrining/' . $nama_file));
            }
        } catch (\Exception $e) {

            DB::rollback();
            dd($e);
            return response()->json(['message' => 'Data is failed imported', "code" => 400], 400);
        }

        DB::commit();

        unlink('/files/skrining/' . $nama_file);

        return response()->json(['message' => 'Data is successfully imported', "code" => 200], 200);
    }
}
