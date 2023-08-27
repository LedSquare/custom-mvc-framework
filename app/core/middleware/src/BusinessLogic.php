<?php

namespace App\Core\Middleware\Src;

use app\core\middleware\src\Request;
use app\core\middleware\src\Response;
use app\core\middleware\src\Handler;
use app\core\middleware\src\Status;

final class BusinessLogic implements Handler 
{
    public function handle(Request $request): Response
    {
        usleep(100);

        return new Response(Status::OK);
    }

}