<?php

namespace App\Providers;

use App\Interfaces\InterfaceRepositoryTasks;
use App\Repositories\RepositoryTasks;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(InterfaceRepositoryTasks::class, function ($app) {
            return $app->make(RepositoryTasks::class);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
