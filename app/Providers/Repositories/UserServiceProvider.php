<?php

namespace App\Providers\Repositories; 

use Illuminate\Support\ServiceProvider;
use App\Repositories\Eloquent\UserRepository; 
use App\Contracts\Repositories\UserRepositoryInterface;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
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
