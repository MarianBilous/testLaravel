<?php

namespace App\Providers;

use App\Repositories\GenreRepository;
use App\Repositories\MovieRepository;
use App\Repositories\RepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            RepositoryInterface::class,
            GenreRepository::class
        );

        $this->app->bind(
            RepositoryInterface::class,
            MovieRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
