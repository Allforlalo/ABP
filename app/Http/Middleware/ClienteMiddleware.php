<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ClienteMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        switch (Auth::user()->id_rol) {
            case 1:
                return redirect('/home_admin');
            case 2:
                return redirect('/home_empleado');
            case 3:
                return $next($request);
        }

        return redirect('/');
    }
}
