<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Repositories\AuthRepository;
use App\Repositories\DashboardRepository;
use App\Repositories\Interfaces\DashboardRepositoryInterface;
use App\Repositories\ProjectRepository;
use App\Repositories\TaskRepository;

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
        $this->app->bind(
            TaskRepositoryInterface::class,
            TaskRepository::class
        );
        
        // **dashboard
        $this->app->bind(
            DashboardRepositoryInterface::class,
            DashboardRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
