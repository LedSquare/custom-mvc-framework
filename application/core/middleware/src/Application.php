<?php

namespace Application\Core\Middleware;

use Application\Core\Middleware\Handler;
use Application\Core\Middleware\Response;

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