<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserLoginCheck
{

    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('loggedInUser') && ($request->path() != "/" && $request->path() != "/register")) {
            return redirect("/");
        }
        if (session()->has('loggedInUser') && ($request->path() == "/" || $request->path() == "/register")) {
            return back();
        }
        // عشان تمنع الارجاع لو ضغط على سهم الارجاع
        return $next($request)->header('Cache-Control','no-cache, no-store,max-age=0,must-revalidate')
        ->header('pragma','no-cache')
        ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');
    }
}
