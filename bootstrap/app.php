<?php

use App\Http\Middleware\RoleMiddleware;
use Illuminate\Console\Scheduling\Schedule;
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
            'role' => RoleMiddleware::class,
        ]);
    })
    // ->withSchedule(function(Schedule $schedule){
    //     $schedule->call(function(){
    //         //the code to execute
    //         dd(auth()->user()->name);
    //     })->everyMinute();
    // })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
