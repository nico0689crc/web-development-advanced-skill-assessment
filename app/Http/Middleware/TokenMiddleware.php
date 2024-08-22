<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Token;
use Illuminate\Http\Request;
use App\Helpers\TokenHelper;
use Symfony\Component\HttpFoundation\Response;

class TokenMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->get('token');

        if (!$token) {
            return redirect('/login');
        }

        $decodedToken = TokenHelper::validateJwt($token);

        if (!$decodedToken) {
            return redirect('/login');
        }

        $hashedToken = hash('sha256', $token);

        $tokenRecord = Token::where('token', $hashedToken)->first();

        if (!$tokenRecord || $tokenRecord->revoked) {
            return redirect('/login');
        }

        $request->authenticated_user = $tokenRecord->user;

        return $next($request);
    }
}
