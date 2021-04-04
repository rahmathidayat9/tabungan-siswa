<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Services\PdfService;

class LaporanController extends Controller
{
	private $pdfService;

	function __construct(PdfService $pdfService)
	{
		$this->pdfService = $pdfService;
	}

    public function index()
    {
    	return view('admin.laporan.index');
    }

    public function transaksi(Request $request)
    {
    	$tanggal = $this->validate($request,[
    		'tgl_mulai' => 'required',
    		'tgl_selesai' => 'required',
    	]);

    	$result = DB::table('transaksi')
    		->join('rekening',function($query) use($tanggal){
				$query->on('transaksi.no_rekening','=','rekening.no_rekening')
					->join('nasabah','nasabah.kd_nasabah','=','rekening.kd_nasabah')
					->whereBetween('transaksi.waktu',$tanggal);
    	});

        $data['transaksi'] = $result->get();
        $data['total'] = $result->sum('transaksi.nominal');
        
    	$tgl_mulai = Carbon::parse($request->tgl_mulai)->format('d-m-Y');
    	$tgl_selesai = Carbon::parse($request->tgl_selesai)->format('d-m-Y');
    	
        if ($data['transaksi']->count() > 0) {
    		return $this->pdfService->export('admin.laporan.transaksi',$data,'laporan-transaksi-'.$tgl_mulai.'-'.$tgl_selesai);	
    	}else{
    		return back()
    		->with('error','Tidak ada data untuk tanggal '.$tgl_mulai.' - '.$tgl_selesai);
    	}
    }
}
