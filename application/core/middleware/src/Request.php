<?php

namespace Application\Core\Middleware;

/**
 * @psalm-immutable
 */
final class Request
{
    public function __construct(
        public readonly string $requestId,
    ){
    }
}
