<?php 

namespace App\Core\Middleware\Src;

use app\core\middleware\src\Status;

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