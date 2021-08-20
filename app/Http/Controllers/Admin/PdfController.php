<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\PdfService;

class PdfController extends Controller
{
    private $pdfService;

    public function __construct(PdfService $pdfService)
    {
        $this->pdfService = $pdfService;
    }

	public function exportPdfUser()
    {    	
        $data['users'] = DB::table('users')->get();
        return $this->pdfService->export('admin.user.preview-pdf',$data,'tabungan-users');
    }

    public function printPdfUser()
    {
    	$data['users'] = DB::table('users')->get();
        return $this->pdfService->print('admin.user.preview-pdf',$data);
    }
}
