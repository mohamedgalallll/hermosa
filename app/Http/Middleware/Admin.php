<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() and auth()->user()->user_type_id == 2) // admin
            return $next($request);
        return redirect('/admin/login');
    }
}
