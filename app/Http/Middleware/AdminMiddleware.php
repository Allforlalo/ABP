<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        switch (Auth::user()->id_rol) {
            case 1:
                return $next($request);
            case 2:
                return redirect('/home_empleado');
            case 3:
                return redirect('/home_cliente');
        }

        return redirect('/login');
    }
}
