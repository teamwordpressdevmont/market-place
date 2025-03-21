<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Token;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class VerifyAccessToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $accessToken = $request->header('Authorization');

        if (!$accessToken) {
            return response()->json(['message' => 'Access Token is required'], 401);
        }

        $tokenRecord = Token::first();

        if (!$tokenRecord) {
            return response()->json(['message' => 'Invalid Access Token'], 401);
        }

        try {
            $decryptedStoredToken = Crypt::decryptString($tokenRecord->token);
            $decryptedStoredTokenPrev = $tokenRecord->previous_token ? Crypt::decryptString($tokenRecord->previous_token) : null;

            $expiresAt = $tokenRecord->expires_at; // Extend expiration by 1 day
            $previousExpiresAt = $tokenRecord->previous_expires_at ? Carbon::parse($tokenRecord->previous_expires_at)->addDay() : null;
        } catch (\Exception $e) {
            return response()->json(['message' => 'Stored token decryption failed'], 401);
        }

        // Attempt to decrypt the provided token
        try {
            $decryptedHeaderToken = Crypt::decryptString($accessToken);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Invalid Access Token format'], 401);
        }

        $currentTime = Carbon::now();
        
        if ( $decryptedHeaderToken === $decryptedStoredToken) 
        {
            return $next($request);
        }
        
        return response()->json(['message' => 'Unauthorized: Token Expired'], 401);
        
        // previous code
        if ( ($decryptedHeaderToken !== $decryptedStoredToken || $currentTime->gt($expiresAt)) && 
        ($decryptedHeaderToken !== $decryptedStoredTokenPrev || !$previousExpiresAt || $currentTime->gt($previousExpiresAt)) )
        {
            return response()->json(['message' => 'Unauthorized: Token Expired'], 401);
        }


        return $next($request);
    }
}
