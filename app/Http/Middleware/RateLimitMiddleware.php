<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redis;

class RateLimitMiddleware
{
    public function handle($request, Closure $next)
    {
        $key = 'rate_limit:' . $request->ip();
        $limit = 10; // Ограничение скорости: 10 запросов
        $interval = 60; // Интервал времени: 1 минута

        $count = Redis::incr($key);
        Redis::expire($key, $interval);

        if ($count > $limit) {
            return response()->json(['error' => 'Rate limit exceeded'], 429);
        }

        return $next($request);
    }
}
