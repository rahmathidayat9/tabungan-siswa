<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $table = 'transfer';

    protected $fillable = [
    	'jns_pembayaran','keterangan','id_transaksi','rek_tujuan','created_at','updated_at'
    ];
}
