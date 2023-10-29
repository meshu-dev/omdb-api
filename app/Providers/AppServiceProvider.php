<?php

namespace App\Providers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use App\Services\Omdb\ApiService;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {

    }

    public function boot(): void
    {
        $this->app->bind(ApiService::class, function (Application $app) {
            $omdbUrl = config('services.omdb.url');
            $omdbKey = config('services.omdb.key');

            return new ApiService($omdbUrl, $omdbKey);
        });
    }
}
