return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Add global middleware here, if needed.
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();

// Register route middleware here
app('router')->aliasMiddleware('admin', \App\Http\Middleware\AdminMiddleware::class);