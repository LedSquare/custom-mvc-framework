<?php

namespace app\core\middleware;

use app\core\middleware\Response;

interface Handler 
{
    public function handle(Request $request): Response;
}