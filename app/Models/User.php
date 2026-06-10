<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Pastikan ini sesuai dengan nama tabel di database kamu
    // Kalau di database namanya 'users', hapus baris di bawah ini atau ganti jadi 'users'
    protected $table = 'users'; 

    /**
     * Atribut yang boleh diisi secara massal.
     */
    protected $fillable = [
    'name',      // Tambahkan 'name'
    'email',     // Tambahkan 'email'
    'password',
    'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}