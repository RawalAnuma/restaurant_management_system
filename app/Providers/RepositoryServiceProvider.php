<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\FoodRepository;
use App\Repositories\Contracts\FoodRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        $this->app->bind(
            FoodRepositoryInterface::class,
            FoodRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}