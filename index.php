<?php

declare(strict_types=1);

use App\Controllers\App;
require __DIR__ . '/app/lib/Dev.php';
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/app/routes/web.php';

echo'<br>';
App::run();
