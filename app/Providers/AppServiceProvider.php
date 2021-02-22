<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\WebsitepageRepository;
use App\Repositories\WebsitepageRepositoryInterface;

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
        $this->app->bind(
            WebsitepageRepositoryInterface::class,
            WebsitepageRepository::class,
        );
        $this->app->bind(
            'App\Repositories\SliderRepositoryInterface',
            'App\Repositories\SliderRepository',
        );
        $this->app->bind(
            'App\Repositories\WebsiteblocRepositoryInterface',
            'App\Repositories\WebsiteblocRepository',
        );

    }
}
