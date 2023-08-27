<?php

namespace Application\Core\Middleware;

use Application\Core\Middleware\Response;

interface Handler 
{
    public function handle(Request $request): Response;
}