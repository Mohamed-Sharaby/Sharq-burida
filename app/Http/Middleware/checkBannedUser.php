<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkBannedUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth('web')->check() && auth('web')->user()->is_active == 0){
            auth('web')->logout();
            return back()->with('error1','لقد تم حظر الحساب الخاص بك من قبل الادارة');
        }
        return $next($request);
    }
}
