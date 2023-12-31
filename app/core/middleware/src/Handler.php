<?php

namespace App\Core\Middleware\Src;

use app\core\middleware\src\{Response, Request};

interface Handler 
{
    public function handle(Request $request): Response;
}