<?php

namespace App\Core\Middleware;

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