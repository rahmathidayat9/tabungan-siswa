<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index()
    {
        return view('operator.index');
    }
}
