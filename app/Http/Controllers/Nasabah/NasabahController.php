<?php

namespace App\Http\Controllers\Nasabah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    public function index()
    {
        return view('nasabah.index');
    }
}
