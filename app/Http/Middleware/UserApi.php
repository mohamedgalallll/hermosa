<?php

namespace App\Http\Middleware;

use Closure;

class UserApi
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() and auth()->user()->user_type_id == 0) // user
            return $next($request);

        $array = [
            'status' =>  false,
            'status_code' => 404,
            'message' => 'This Auth Is Not User',
            'error' => true,
            'data' => '',
        ];
        return response($array,404);
    }
}
