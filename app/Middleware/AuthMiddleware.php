<?php

namespace App\Middleware;

use Core\Logger;

class AuthMiddleware
{
    public static function handle($request, $response, $next)
    {

        if (!$request->cookies['username']) {

            Logger::info('Unauthorized Access');

            return $response->json([
                'status' => 'error',
                'message' => 'Unauthorized, please login and try again',
            ], 401);
        }

        // Pass to next
        return $next();
    }
}
