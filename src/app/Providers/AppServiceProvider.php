<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ParserInterface;
use App\Services\Parser;
use App\Repositories\Interfaces\WeatherRepositoryInterface;
use App\Repositories\WeatherRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ParserInterface::class, Parser::class);
        $this->app->bind(WeatherRepositoryInterface::class, WeatherRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
