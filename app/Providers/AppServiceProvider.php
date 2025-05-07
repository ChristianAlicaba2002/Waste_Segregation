<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\ClientSide\ClientRepository;
use App\Infrastructure\Persistence\Eloquent\ClientSide\EloquentClientRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
       
        $this->app->bind(ClientRepository::class, EloquentClientRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
