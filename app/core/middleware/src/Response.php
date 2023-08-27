<?php 

namespace app\core\middleware;

use app\core\middleware\Status;

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