<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pembeli extends Authenticatable
{
    use Notifiable;

    protected $table = 'customer'; // Sesuai tabel di database
    protected $primaryKey = 'id_customer'; // Sesuai kolom di database
    
    protected $fillable = [
        'nama_customer', // Sesuai kolom di database
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}