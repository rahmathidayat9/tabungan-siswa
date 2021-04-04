<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class TransferController extends Controller
{
    public function index()
    {
    	$histori_transfer = $this->historiTransfer();
    	$nasabah = $this->rekeningNasabah();
    	return view('transaksi.transfer.index',compact('nasabah','histori_transfer'));
    }

    public function historiTransfer()
    {
    	$histori_transfer = DB::table('transfer')
    	->join('transaksi',function($join){
			$join->on('transaksi.id','=','transfer.id_transaksi')
				->join('rekening','rekening.no_rekening','=','transaksi.no_rekening')
				->join('nasabah','nasabah.kd_nasabah','=','rekening.kd_nasabah');
    	})->latest('transfer.id_transfer')->get();

    	return $histori_transfer;
    }

    private function rekeningNasabah()
    {
    	$nasabah = DB::table('nasabah')->join('rekening',function($join){
			$join->on('nasabah.kd_nasabah','=','rekening.kd_nasabah')
				->select('nasabah.nm_nasabah','rekening.no_rekening');
		})->get();

		return $nasabah;
    }

    public function store(Request $request)
    {

		//pengirim
		$pengirim = DB::table('rekening')
			->where('no_rekening',$request->no_rekening)
			->first();

		//penerima
		$penerima = DB::table('rekening')
			->where('no_rekening',$request->rek_tujuan)
			->first();

		//cek penerima
		$cek_penerima = DB::table('rekening')
			->where('no_rekening',$request->rek_tujuan);

        if ($cek_penerima->count() < 1) {
            return back()->with('error','Transfer Gagal , Rekening tujuan tidak terdaftar');
        }
        
        if ($request->rek_tujuan == $request->no_rekening) {
            return back()->with('error','Transfer Gagal , Rekening tujuan tidak valid');
        }

        if ($request->nominal < 1) {
        	return back()->with('error','Transfer Gagal , Nominal tidak valid');		
        }

        if ($pengirim->saldo >= 50000) {
			DB::transaction(function() use($request,$pengirim,$penerima){
				DB::table('transaksi')->insert([
					'no_rekening' => $request->no_rekening,
					'nominal' => $request->nominal,
					'jns_transaksi' => 'transfer',
					'waktu' => $request->waktu,
				]);

				//dapatkan transakssi terakhir berdasarkan id
				$last_transaksi = DB::table('transaksi')
					->where('jns_transaksi','transfer')
					->latest('id')
				->first();
				
				DB::table('transfer')->insert([
					'jns_pembayaran' => $request->jns_pembayaran,
					'keterangan' => $request->keterangan,
					'id_transaksi' => $last_transaksi->id,
					'rek_tujuan' => $request->rek_tujuan,
				]);

				//update saldo pegirim
				DB::table('rekening')
					->where('no_rekening',$request->no_rekening)
					->update([
						'saldo' => $pengirim->saldo - $request->nominal,
					]);

				//update saldo penerima
				DB::table('rekening')
					->where('no_rekening',$request->rek_tujuan)
					->update([
						'saldo' => $penerima->saldo + $request->nominal,
					]);
			});
			
			return back()->with('success','Transfer berhasil dilakukan');
		}else{
        	return back()->with('error','Transfer gagal dilakukan , saldo pengirim tidak mencukupi');
        }
    }
}