<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Jika permintaan mengharapkan JSON, tidak ada pengalihan
        if ($request->expectsJson()) {
            return null;
        }

        // Cek apakah pengguna mencoba mengakses route pendaftaran
        if ($request->is('register')) {
            return route('login'); // Arahkan ke login jika mencoba mengakses register
        }

        // Arahkan ke halaman login untuk route lainnya
        return route('login');
    }
}