<?php 

namespace Application\Core\Middleware;

use Application\Core\Middleware\Status;

/**
 * @psalm-immutable
 */
final class Response 
{
    public function __construct(
        public readonly Status $status,
    ){
    }
}