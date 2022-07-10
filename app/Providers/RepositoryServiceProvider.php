<?php

namespace App\Providers;

use App\Repositories\Eloquent\Interfaces\PublicationRepositoryInterface;
use App\Repositories\Eloquent\Interfaces\ResultRepositoryInterface;
use App\Repositories\Eloquent\PublicationRepository;
use App\Repositories\Eloquent\ResultRepository;
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
        $this->app->bind(PublicationRepositoryInterface::class, PublicationRepository::class);
        $this->app->bind(ResultRepositoryInterface::class, ResultRepository::class);
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

