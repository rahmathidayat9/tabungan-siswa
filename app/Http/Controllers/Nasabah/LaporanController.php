<?php

namespace App\Http\Controllers\Nasabah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Services\PdfService;

class LaporanController extends Controller
{
	private $pdfService;

	function __construct(PdfService $pdfService)
	{
		$this->pdfService = $pdfService;
	}

    public function transferKeluar(Request $request)
    {
    	$tanggal = $this->validate($request,[
    		'tgl_mulai' => 'required',
    		'tgl_selesai' => 'required',
    	]);

    	$result = DB::table('nasabah')
    		->where('id_users',auth()->user()->id_users)
    		->join('rekening',function($query) use($tanggal){
    			$query->on('nasabah.kd_nasabah','=','rekening.kd_nasabah')
    				->join('transaksi','rekening.no_rekening','=','transaksi.no_rekening')
    				->where('transaksi.jns_transaksi','transfer')
    				->whereBetween('transaksi.waktu',$tanggal);
    		});

        $data['transaksi'] = $result->get();
        $data['total'] = $result->sum('transaksi.nominal');

    	$tgl_mulai = Carbon::parse($request->tgl_mulai)->format('d-m-Y');
    	$tgl_selesai = Carbon::parse($request->tgl_selesai)->format('d-m-Y');
    	
        if ($data['transaksi']->count() > 0) {
    		return $this->pdfService->export('nasabah.laporan.transfer-keluar',$data,'laporan-transfer-keluar-'.$tgl_mulai.'-'.$tgl_selesai.Str::random(5));	
    	}else{
    		return back()
    		->with('error','Tidak ada data untuk tanggal '.$tgl_mulai.' - '.$tgl_selesai);
    	}
    }
}
