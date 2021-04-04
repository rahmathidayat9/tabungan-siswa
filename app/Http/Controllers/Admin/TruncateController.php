<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TruncateController extends Controller
{
    public function transaksi()
    {
    	DB::table('transaksi')->truncate();
 		DB::table('transfer')->truncate();
 		return back()->with('success','Semua data transaksi berhasil di hapus');   	
    }
}
