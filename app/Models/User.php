<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // 1. Hubungkan model ke nama tabel asli di database .sql kalian
    protected $table = 'admin';

    // 2. Sesuaikan nama Primary Key tabel admin kalian
    protected $primaryKey = 'id_admin';

    /**
     * Atribut yang boleh diisi secara massal (Mass Assignable).
     */
    protected $fillable = [
        'nama_admin',
        'username',
        'password',
    ];

    /**
     * Atribut yang harus disembunyikan demi alasan keamanan.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Beritahu Laravel bahwa field password dienkripsi otomatis (bawaan Laravel 11/12)
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}