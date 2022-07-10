<?php

namespace App\Providers;

use App\Http\Resources\RepetitionOfNumbersResource;
use App\Http\Resources\ResultByDateResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        RepetitionOfNumbersResource::withoutWrapping();
        ResultByDateResource::withoutWrapping();
    }
}