<?php

namespace App\Core\Middleware;

use App\Core\Middleware\Handler;
use App\Core\Middleware\Response;

final class Application 
{

    public function __construct(
        private readonly Handler $handler,
    ){
    }

    public function handle(Request $request): Response 
    {
        return $this->handler->handle($request);
    }
}