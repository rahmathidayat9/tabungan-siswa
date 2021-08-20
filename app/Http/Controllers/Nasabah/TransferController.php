<?php

namespace App\Http\Controllers\Nasabah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class TransferController extends Controller
{
    public function index()
    {
    	$nasabah = DB::table('nasabah')
    		->where('id_users',auth()->user()->id_users)
    		->join('rekening','rekening.kd_nasabah','=','nasabah.kd_nasabah')
    		->first();

        $saldo = DB::table('rekening')
            ->where('no_rekening',$nasabah->no_rekening)
            ->first()->saldo;

    	return view('nasabah.transfer.index',compact('nasabah','saldo'));
    }

    public function store(Request $request)
    {
        $my_saldo = DB::table('nasabah')
            ->where('id_users',auth()->user()->id_users)
            ->join('rekening',function($query){
                $query->on('rekening.kd_nasabah','=','nasabah.kd_nasabah');
            })->sum('rekening.saldo');

        $cek_penerima = DB::table('rekening')->where('no_rekening',$request->rek_tujuan);

        if ($cek_penerima->count() < 1) {
            return back()->with('error','Transfer Gagal , Rekening tujuan tidak terdaftar');
        }
        
        if ($request->rek_tujuan == $request->no_rekening) {
            return back()->with('error','Transfer Gagal , Rekening tujuan tidak valid');
        }

        if ($my_saldo >= $request->nominal) {

            DB::transaction(function() use($request,$my_saldo){
				
                DB::table('transaksi')->insert([
					'no_rekening' => $request->no_rekening,
					'nominal' => $request->nominal,
					'jns_transaksi' => 'transfer',
					'waktu' => $request->waktu,
				]);

                //transaksi terakhir
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

                //transfer terakhir
                $last_transfer = DB::table('transfer')
                    ->where('transfer.id_transaksi',$last_transaksi->id)
                    ->where('rekening.no_rekening',$request->rek_tujuan)
                    ->join('rekening','transfer.rek_tujuan','=','rekening.no_rekening')
                    ->latest('transfer.id_transfer')
                ->first();

                //update saldo rekening pengirim
                DB::table('rekening')
                    ->where('no_rekening',$request->no_rekening)
                    ->update([
                        'saldo' => $my_saldo - $request->nominal,
                    ]);

                //update saldo rekening penerima
                DB::table('rekening')
                    ->where('no_rekening',$request->rek_tujuan)
                    ->update([
                        'saldo' => $last_transfer->saldo + $request->nominal,
                    ]);

    		});
            return back()->with('success','Transfer berhasil');
        }else{
            return back()->with('error','Transfer gagal , saldo anda tidak mencukupi');
        }
    }

    public function historiTransfer()
    {
        $nasabah = DB::table('nasabah')
            ->where('id_users',auth()->user()->id_users)
            ->join('rekening','rekening.kd_nasabah','=','nasabah.kd_nasabah')
            ->first();
            
        $histori_transfer = DB::table('transaksi')
            ->where('transaksi.no_rekening',$nasabah->no_rekening)
            ->where('transaksi.jns_transaksi','transfer')
            ->join('transfer','transaksi.id','=','transfer.id_transaksi')
            ->get();

        return view('nasabah.transfer.histori-transfer',compact('histori_transfer'));
    }
}
