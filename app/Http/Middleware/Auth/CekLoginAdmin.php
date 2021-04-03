<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Support\Facades\Auth;

class CekLoginAdmin
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('login.index')->with(['jenis' => 'danger', 'pesan' => 'Anda belum login']);
        }

        return $next($request);
    }
}
