<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminBasicAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // app/Http/Middleware/AdminBasicAuth.php
    public function handle($request, Closure $next)
    {
        $expectedUser = config('admin.user');
        $expectedPass = config('admin.pass');

        if (empty($expectedUser) || empty($expectedPass)) {
            return response('Unauthorized', 401, ['WWW-Authenticate' => 'Basic']);
        }

        if (
            ! hash_equals($expectedUser, (string) request()->getUser()) ||
            ! hash_equals($expectedPass, (string) request()->getPassword())
        ) {
            return response('Unauthorized', 401, ['WWW-Authenticate' => 'Basic']);
        }

        return $next($request);
    }

}
