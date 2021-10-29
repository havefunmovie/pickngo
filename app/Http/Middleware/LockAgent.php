<?php

namespace App\Http\Middleware;

use Closure;

class LockAgent
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->status === '0') {
            return redirect()->route('agent.lock');
        }

        return $next($request);
    }
}