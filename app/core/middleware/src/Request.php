<?php

namespace App\Core\Middleware;

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
