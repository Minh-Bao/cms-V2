<?php

namespace App\Providers;

use App\Repositories\UserRepository;
use App\Repositories\SliderRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\SliderImageRepository;
use App\Repositories\WebsiteblocRepository;
use App\Repositories\WebsitepageRepository;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\SliderRepositoryInterface;
use App\Repositories\SliderImageRepositoryInterface;
use App\Repositories\WebsiteblocRepositoryInterface;
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
        /*Bind repository and interface*/
        $this->app->bind(
            WebsitepageRepositoryInterface::class,
            WebsitepageRepository::class,
        );
        $this->app->bind(
            SliderRepositoryInterface::class,
            SliderRepository::class,
        );
        $this->app->bind(
            WebsiteblocRepositoryInterface::class,
            WebsiteblocRepository::class,
        );
        $this->app->bind(
            SliderImageRepositoryInterface::class,
            SliderImageRepository::class,
        );
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class,
        );




    }
}
