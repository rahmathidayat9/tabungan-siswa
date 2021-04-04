<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Nasabah;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'level',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $timestamp = true;

    public function nasabah()
    {
        return $this->hasOne(Nasabah::class,'id_users');
    }

    public function hasRole($role)
    {
        return $this->level == $role;
    }

    public function isAdmin()
    {
        return $this->level == 'admin';
    }
}
