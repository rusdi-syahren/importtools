<?php

namespace App\Console\Commands;

use App\Models\Transaksikeu;
use App\Models\Transaksijurnal;
use Illuminate\Console\Command;
use App\Models\Transaksibukubesar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class JurnalCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jurnal:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()

    {
        Log::info("Cron Posting Jurnal is working fine!");

        DB::enableQueryLog();
        $transaksiJurnal =
            Transaksijurnal::select(
                't_jurnal.*',
                'm_transaksikeu.jenis',
            )->leftJoin('t_transaksikeu', 't_jurnal.t_transaksikeu_id', '=', 't_transaksikeu.id')->leftJoin('m_transaksikeu', 't_transaksikeu.m_transaksikeu_id', '=', 'm_transaksikeu.id');

        $dates = explode("-",  date("Y-m"));
        $year = $dates[0];
        $month = $dates[1];

        $transaksiJurnal->whereYear('t_transaksikeu.tanggal_transaksi', $year);
        $transaksiJurnal->whereMonth('t_transaksikeu.tanggal_transaksi', $month);

        DB::beginTransaction();
        try {
            $listIdTransaksi = $transaksiJurnal->pluck('t_jurnal.t_transaksikeu_id');

            $jurnals = $transaksiJurnal->select(
                DB::raw("(sum(t_jurnal.debit)) as total_debit"),
                DB::raw("(sum(t_jurnal.kredit)) as total_kredit"),
                't_jurnal.*',
            )->where('t_jurnal.status', 'Not Posted')->groupBy(DB::raw("DATE_FORMAT(t_jurnal.created_at, '%Y-%m')"), 't_jurnal.coa_id')->get();


            if ($jurnals) {
                foreach ($jurnals as $jurnal) {
                    $dates = explode("-",  $jurnal->trx_keu->tanggal_transaksi);
                    $year = $dates[0];
                    $month = $dates[1];

                    $data_bukubesar = Transaksibukubesar::latest()->where('coa_id', $jurnal->coa_id)->whereYear('created_at', $year)->whereMonth('created_at', $month);
                    if ($data_bukubesar->count() > 0) {

                        $old_data =  $data_bukubesar->get();
                        $old_debit = $old_data[0]->debit;
                        $old_kredit = $old_data[0]->kredit;

                        $dataTransaksiBukuBesar = array(
                            'debit' => (float) $old_debit + (float) $jurnal->total_debit,
                            'kredit' => (float) $old_kredit + (float) $jurnal->total_kredit,
                            'priode' => $year . "-" . $month . "-01"
                        );
                        $data_bukubesar->update($dataTransaksiBukuBesar);
                        $bukubesar = $old_data[0];
                    } else {
                        $dataTransaksiBukuBesar = array(
                            'debit' => (float) $jurnal->total_debit,
                            'kredit' => (float) $jurnal->total_kredit,
                            'coa_id' => $jurnal->coa_id,
                            'priode' => $year . "-" . $month . "-01"


                        );
                        $bukubesar = Transaksibukubesar::create($dataTransaksiBukuBesar);
                    }


                    $jurnalBukubesar = array(
                        "bukubesar_id" => $bukubesar->id,
                    );

                    $updateBukubesar = Transaksijurnal::select('t_jurnal.*', 't_transaksikeu.tanggal_transaksi')->leftJoin('t_transaksikeu', 't_jurnal.t_transaksikeu_id', '=', 't_transaksikeu.id')->where("coa_id", $jurnal->coa_id);


                    $updateBukubesar->where('t_jurnal.t_transaksikeu_id', $jurnal->t_transaksikeu_id);
                    $updateBukubesar->whereYear('t_transaksikeu.tanggal_transaksi', $year);
                    $updateBukubesar->whereMonth('t_transaksikeu.tanggal_transaksi', $month);

                    $updateBukubesar->update($jurnalBukubesar);
                }

                // update status jurnal = Posted 
                $dataTrxKeu = array(
                    "status" => 'Closed'
                );

                Transaksikeu::whereIn("id", $listIdTransaksi)->where("status", "Open")->update($dataTrxKeu);

                // update status jurnal = Posted 
                $dataJurnal = array(
                    "t_jurnal.status" => 'Posted',
                );

                $transaksiJurnal->update($dataJurnal);
            }
        } catch (\Exception $e) {

            DB::rollback();
            Log::info("Error, " . $e);
        }

        DB::commit();
        return 0;
    }
}
