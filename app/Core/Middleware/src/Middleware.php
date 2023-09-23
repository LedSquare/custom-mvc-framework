<?php

namespace App\Core\Middleware\Src;

use app\core\middleware\src\{Request, Response};

interface Middleware 
{
    /**
     * @param callable(Request): Response $next
     */
    public function handle(Request $request, callable $next): Response;
}