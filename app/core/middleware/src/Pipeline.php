<?php

namespace App\Core\Middleware\Src;

use app\core\middleware\src\{Response, Request, Handler};

final class Pipeline 
{
    /**
     * @param list<Middleware> $middlewares
     */
    public function __construct(
        private readonly Handler $handler,
        private array $middlewares,
    ){
    }

    /**
     * This function has recursion. 
     * In case the first middleware that was fetched will call "next", 
     * then "next" will come to the same object, select the next middleware, 
     * transfer execution to it, or, if it does not exist, call the final handler
     */
    public function handle(Request $request): Response
    {
        $middleware = array_shift($this->middlewares);

        if ($middleware == !null){
            return $middleware->handle($request, [$this, 'handle']);
        }

        return $this->handler->handle($request);
    }
}