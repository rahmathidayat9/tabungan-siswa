<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Rekening;

class Nasabah extends Model
{
    use HasFactory;

    protected $table = 'nasabah';

    protected $fillable = [
    	'kd_nasabah','nm_nasabah','no_hp','email','alamat','id_users',
    ]; 

    public function rekening()
    {
        return $this->hasOne(Rekening::class,'kd_nasabah');
    }
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
