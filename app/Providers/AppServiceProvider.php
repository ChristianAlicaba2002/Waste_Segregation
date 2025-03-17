<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\WasteCategory\WasteCategoryRepository;
use App\Infrastructure\Persistence\Eloquent\WasteCategory\EloquentWasteCategoryRepository;
use App\Domain\WasteItem\WasteItemRepository;
use App\Infrastructure\Persistence\Eloquent\WasteItem\EloquentWasterItemRepository;
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
        $this->app->bind(WasteCategoryRepository::class, EloquentWasteCategoryRepository::class);
        $this->app->bind(WasteItemRepository::class, EloquentWasterItemRepository::class);
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
