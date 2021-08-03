<?php

namespace App\Providers;

use App\Http\Repositories\Impl\UserRepositoryImpl;
use App\Http\Repositories\UserRepository;
use App\Http\Services\Impl\UserServiceImpl;
use App\Http\Services\UserService;
<<<<<<< HEAD
=======

>>>>>>> b33cddfc89923c718417d0913086fd44117a1a6a
use App\Http\Repositories\ApartmentRepository;
use App\Http\Repositories\Impl\ApartmentRepositoryImpl;
use App\Http\Services\ApartmentService;
use App\Http\Services\Impl\ApartmentServiceImpl;
<<<<<<< HEAD
=======

>>>>>>> b33cddfc89923c718417d0913086fd44117a1a6a
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
