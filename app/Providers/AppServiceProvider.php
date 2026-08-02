<?php

namespace App\Providers;

use App\Repositories\AuthRepository;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use App\Repositories\ProjectRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // **bind repositories

        // **auth
        $this->app->bind(
            AuthRepositoryInterface::class,
            AuthRepository::class
        );

        // **projects
        $this->app->bind(
            ProjectRepositoryInterface::class,
            ProjectRepository::class
        );

        // **tasks
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
