<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Closure;


class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            
            if (Auth::guard($guard)->check()) {
                return redirect()->route('admin.dashboard');  // توجيه المستخدم إلى لوحة التحكم
            }
        }

        return $next($request);
    }
}
