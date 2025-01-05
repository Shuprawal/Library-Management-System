<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app = Application::configure(basePath: dirname(__DIR__));

$app->withRouting(function ($router) {
    $router->loadRoutesFrom(__DIR__.'/../routes/web.php');
    $router->loadRoutesFrom(__DIR__.'/../routes/api.php');
    $router->loadRoutesFrom(__DIR__.'/../routes/console.php');
});

$app->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ]);
});

$app->withExceptions(function (Exceptions $exceptions) {
    // Add exception handling logic here
});

return $app->create();
