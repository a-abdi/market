<?php

namespace App\Providers\Repositories; 

use Illuminate\Support\ServiceProvider;
use App\Repositories\Eloquent\CommentRepository; 
use App\Contracts\Repositories\CommentRepositoryInterface;

class CommentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
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
