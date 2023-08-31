<?php

namespace App\Core\Middleware\Src;

use app\core\middleware\src\{Middleware, Response, Request, Status};

final class Validation implements Middleware
{
    public function handle(Request $request, callable $next): Response
    {
        if ($request->title === ''){
            return new Response(Status::BAD_REQUEST);
        }

        return $next($request);
    }
}