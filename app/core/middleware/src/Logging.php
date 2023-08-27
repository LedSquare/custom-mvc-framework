<?php

namespace App\Core\Middleware\Src;

use app\core\middleware\src\{Middleware, Request, Response};
use Psr\Log\LoggerInterface;

final class Logging implements Middleware
{
    public function __construct(
        private readonly LoggerInterface $logger,
    ){
    }

    public function handle(Request $request, callable $next): Response
    {
        $this->logger->info('Request', [
            'request_id' => $request->requestId,
            'request' => $request,
        ]);

        $response = $next($request);

        $this->logger->info('Request', [
            'request_id' => $request->requestId,
            'response' => $response,
        ]);

        return $response;
    }
}