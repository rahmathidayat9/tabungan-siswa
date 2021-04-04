<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {

        $total_transaksi = $this->totalTransaksi();
    	
        return view('admin.index',compact('total_transaksi'));
    }

    private function totalTransaksi()
    {
        $transaksi = DB::table('transaksi')->sum('nominal');
        return $transaksi;
    }
}