<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\True_;

class BasicAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $check = config('baseauth.users')->where('username', $request->getUser())->where('password', $request->getPassword());
        if ($check->count() > 0) {
            return $next($request);
        }

        return response()->json([
            'code' => 401,
            'error' => True,
            'message' => "Unauthorized",
            'data' => array()
        ], 401);
    }
}
