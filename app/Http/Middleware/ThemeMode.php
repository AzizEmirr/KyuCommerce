<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeMode
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $themeMode = $user->mode == 1 ? 'dark' : 'light';
            view()->share('themeMode', $themeMode);
        }
        
        return $next($request);
    }
}
