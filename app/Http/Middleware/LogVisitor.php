<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Kullanıcının IP adresini alıyoruz
        $ip = $request->ip();

        // Kullanıcının User-Agent bilgisini alıyoruz
        $userAgent = $request->header('User-Agent');

        // Tarayıcı bilgisini alacak basit bir regex
        preg_match('/\((.*?)\)/', $userAgent, $matches);
        $browserInfo = isset($matches[1]) ? $matches[1] : 'Unknown';
        
        if (!DB::table('visitors')->where('ip_address', $ip)
                                  ->where('user_agent', $browserInfo)
                                  ->whereDate('visited_at', today())
                                  ->exists()) {
            DB::table('visitors')->insert([
                'ip_address' => $ip,
                'user_agent' => $browserInfo,
                'visited_at' => now()
            ]);
        }

        return $next($request);
    }
}
