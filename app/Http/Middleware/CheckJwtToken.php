<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Symfony\Component\HttpFoundation\Response;

class CheckJwtToken
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();
        if (!$token) {
            return response()->json(['error' => 'Token not provided'], Response::HTTP_UNAUTHORIZED);
        }

        try {
            $publicKey = file_get_contents(storage_path('oauth-public.key'));
            $decoded = JWT::decode($token, new Key($publicKey, 'RS256'));
            // You can add additional checks here, e.g., checking the scopes or other claims

            // Store the decoded token data in the request for later use
            $request->attributes->add(['jwt_payload' => (array)$decoded]);

        } catch (Exception $e) {
            return response()->json(['error' => 'Token is invalid: ' . $e->getMessage()], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
