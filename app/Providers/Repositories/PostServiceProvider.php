<?php

namespace App\Providers\Repositories; 

use Illuminate\Support\ServiceProvider;
use App\Contracts\Repositories\PostRepositoryInterface;
use App\Repositories\Eloquent\PostRepository;

class PostServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
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
