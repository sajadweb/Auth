<?php


namespace Api\Auth\Middleware;

use Closure;
use Illuminate\Support\Facades\Storage;

class ClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $token = $request->bearerToken();

        if ($token == null) {
            return NotAcceptable406();
        }
        if (jwt_decode($token) == null) {
            return Unauthorized401();
        }
        return $next($request);

    }
}
