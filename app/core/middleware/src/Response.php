<?php 

namespace App\Core\Middleware;

use App\Core\Middleware\Status;

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