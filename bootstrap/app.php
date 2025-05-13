<?php

use App\Exception\Repositories\ExceptionsTasksRepositories;
use App\Exception\Requests\ExceptionWrongDataTasksProvided;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->validateCsrfTokens(except: [
            '/*'
        ]);
        $middleware->append(\App\Http\Middleware\AuthenticateOnceWithBasicAuth::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (ValueError $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
            ]);
        });
    })->create();
