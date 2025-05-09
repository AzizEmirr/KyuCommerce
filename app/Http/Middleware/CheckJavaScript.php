<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckJavaScript
{
    public function handle(Request $request, Closure $next)
    {
        // Eğer request JavaScript'ten gelmiyorsa bir uyarı sayfasına yönlendir
        if (!$request->has('js_enabled')) {
            return response()->view('javascript_disabled');
        }

        return $next($request);
    }
}
