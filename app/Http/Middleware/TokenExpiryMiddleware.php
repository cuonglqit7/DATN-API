<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenExpiryMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->user()->currentAccessToken();

        $createdAt = $token->created_at;

        if ($createdAt->addMinutes(2)->isPast()) {
            // Thu hồi token nếu đã hết hạn
            $token->delete();

            return response()->json([
                'message' => 'Token đã hết hạn. Vui lòng đăng nhập lại!'
            ], Response::HTTP_UNAUTHORIZED);
        }
        return $next($request);
    }
}
