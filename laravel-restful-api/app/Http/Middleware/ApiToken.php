<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Http\JsonResponse;

/**
 * Class ApiToken
 * @package App\Http\Middleware
 */
class ApiToken
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
        $auth = request()->header('Authorization');


        if ($auth) {

            $token = str_replace('Bearer ', '', $auth);

            if (!$token) {

                return response()->json(['message' => 'No Bearer Token!'], JsonResponse::HTTP_UNAUTHORIZED);

            }

            $user = User::where('api_token', $token)->first();

            if (!$user) {

                return response()->json(['message' => 'Invalid Bearer Token!'], JsonResponse::HTTP_UNAUTHORIZED);

            }

            auth()->setUser($user);

            return $next($request);

        }

        return response()->json(['message' => 'Not A Valid Bearer Token!'], JsonResponse::HTTP_UNAUTHORIZED);

    }
}
