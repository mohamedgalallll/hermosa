<?php

namespace App\Http\Middleware;

use Closure;

class AdminGroups
{
    public function handle($request, Closure $next ,$role)
    {
        if (auth()->user()->admin_group === null || auth()->user()->admin_group == '0' || auth()->user()->group->$role == 0){
//            return redirect(url('/admin'))->with('error', 'You Dont Have Privilege To Use This Page');
        }
        return $next($request);
    }
}
