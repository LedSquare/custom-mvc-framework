<?php

namespace App\Core\Middleware\Src;

enum Status: string
{
    case OK = 'OK';
    case BAD_REQUEST = 'BAD REQUEST';
}
