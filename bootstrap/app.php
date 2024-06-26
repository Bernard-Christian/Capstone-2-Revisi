<?php

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
        $middleware->alias([
            'prodi' => \App\Http\Middleware\Prodi::class,
            'mahasiswa' => \App\Http\Middleware\Mahasiswa::class,
            'admin' => \App\Http\Middleware\admin::class,
            'fakultas' => \App\Http\Middleware\fakultas::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
