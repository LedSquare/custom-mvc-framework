<?php

namespace App\Core\Middleware\Src;

use app\core\middleware\src\{Request, Response, Handler, Status};

final class BusinessLogic implements Handler 
{
    public function handle(Request $request): Response
    {
        usleep(100);

        return new Response(Status::OK);
    }

}