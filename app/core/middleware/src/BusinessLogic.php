<?php

namespace App\Core\Middleware;


final class BusinessLogic implements Handler 
{
    public function handle(Request $request): Response
    {
        usleep(100);

        return new Response(Status::OK);
    }

}