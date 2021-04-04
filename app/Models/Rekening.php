<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Nasabah;
use App\Models\Transaksi;

class Rekening extends Model
{
    use HasFactory;

    protected $table = 'rekening'; 

    protected $fillable = [
    	'no_rekening','saldo','pin','kd_nasabah',
    ];

    public function nasabah()
    {
    	return $this->belongsTo(Nasabah::class,'kd_nasabah');
    }

	public function transaksi()
    {
    	return $this->hasMany(Transaksi::class,'no_rekening');
    }	    
}
