<?php

namespace App\Providers;

use App\Http\Repositories\ImageRepository;
use App\Http\Repositories\Impl\ImageRepositoryImpl;
use App\Http\Repositories\Impl\UserRepositoryImpl;
use App\Http\Repositories\UserRepository;
use App\Http\Services\ImageService;
use App\Http\Services\Impl\ImageServiceImpl;
use App\Http\Services\Impl\UserServiceImpl;
use App\Http\Services\UserService;
use App\Http\Repositories\ApartmentRepository;
use App\Http\Repositories\Impl\ApartmentRepositoryImpl;
use App\Http\Services\ApartmentService;
use App\Http\Services\Impl\ApartmentServiceImpl;
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
        $this->app->singleton(
            UserRepository::class,
            UserRepositoryImpl::class
        );

        $this->app->singleton(
            UserService::class,
            UserServiceImpl::class
        );

        $this->app->singleton(
            ApartmentService::class,
            ApartmentServiceImpl::class
        );

        $this->app->singleton(
            ApartmentRepository::class,
            ApartmentRepositoryImpl::class
        );

        $this->app->singleton(
            ImageService::class,
            ImageServiceImpl::class
        );

        $this->app->singleton(
            ImageRepository::class,
            ImageRepositoryImpl::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
