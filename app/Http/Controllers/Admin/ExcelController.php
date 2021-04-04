<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\ExcelService;

//User Export & Import 
use App\Exports\UsersExport;
use App\Imports\UsersImport;

class ExcelController extends Controller
{
    private $excelService;

    public function __construct(ExcelService $excelService)
    {
        $this->excelService = $excelService;
    }

    public function exportExcelUser()
    {
        return $this->excelService->export(new UsersExport,'tabungan-users');
    }

    public function importExcelUser()
    {
        $this->excelService->import(new UsersImport);
    	return redirect()->route('admin.user.index')->with('success','Data berhasil diimport');
    }
}