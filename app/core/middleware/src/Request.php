<?php

namespace app\core\middleware;

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
