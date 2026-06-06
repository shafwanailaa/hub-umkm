<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    */

    'guards' => [
        // Guard default membaca tabel admin (penjual)
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        // KUNCI PERBAIKAN: Guard kustom untuk mengunci sesi login customer
        'pembeli' => [
            'driver' => 'session',
            'provider' => 'pembeli_provider',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    */

    'providers' => [
        // Provider untuk Admin (Penjual) membaca Model Admin
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class, 
        ],

        // KUNCI PERBAIKAN: Provider untuk Pembeli membaca Model Pembeli
        'pembeli_provider' => [
            'driver' => 'eloquent',
            'model' => App\Models\Pembeli::class, // Sesuaikan dengan nama model pembeli kelompokmu
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];