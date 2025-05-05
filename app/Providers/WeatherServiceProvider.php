<?php

namespace App\Providers;

use App\Contracts\WeatherRepositoryInterface;
use App\Repositories\WeatherRepository;
use Illuminate\Support\ServiceProvider;

class WeatherServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(WeatherRepositoryInterface::class, WeatherRepository::class);
    }

    public function boot()
    {
        //
    }
}