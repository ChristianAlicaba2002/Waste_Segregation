<?php

    use App\Http\Middleware\RedirectIfAuthenticated;

    $routeMiddleware = [
        'guest' => RedirectIfAuthenticated::class
    ];
