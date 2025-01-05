<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app = Application::configure(basePath: dirname(__DIR__));

$app->withRouting([
    'web' => __DIR__.'/../routes/web.php',
    'api' => __DIR__.'/../routes/api.php',
    'commands' => __DIR__.'/../routes/console.php',
    'health' => '/up',
]);

$app->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ]);
});

$app->withExceptions(function (Exceptions $exceptions) {
    // Add exception handling logic here
});

return $app->create();