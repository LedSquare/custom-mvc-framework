<?php

namespace App\Core\Middleware;

use App\Core\Middleware\Response;

interface Handler 
{
    public function handle(Request $request): Response;
}