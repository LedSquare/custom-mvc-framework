<?php

namespace App\Core\Middleware\Src;


/**
 * @psalm-immutable
 */
final class Request
{
    public function __construct(
        public readonly string $requestId,
        public readonly string $title,
    ){
    }
}
