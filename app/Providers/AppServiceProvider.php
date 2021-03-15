<?php

namespace App\Providers;

use Laravel\Fortify\Fortify;
use Illuminate\Pagination\Paginator;
use App\Repositories\SliderRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\SliderImageRepository;
use App\Repositories\WebsiteblocRepository;
use App\Repositories\WebsitepageRepository;
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

        /*Register fortify security bundle*/
        Fortify::loginView(function () {
            return view('auth.login');
        });

        Fortify::registerView(function () {
            return view('auth.register');
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.passwords.email');
        });
        Fortify::resetPasswordView(function ($request) {
            return view('auth.passwords.reset', ['token' => $request->token]);
        });

        Fortify::verifyEmailView(function () {
            return view('auth.verify');
        });


    }
}
