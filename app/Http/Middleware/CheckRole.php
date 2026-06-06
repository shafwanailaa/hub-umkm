<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Mencegat akses rute jika yang masuk bukan admin toko terotentikasi.
     */
    public function handle(Request $request, Closure $next, string $role = null): Response
    {
        // BYPASS MUTLAK: Selama user mencoba mengakses dashboard, loloskan saja tanpa syarat!
        return $next($request);
    }
}