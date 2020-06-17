<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PostsService;
use App\Services\CommentsService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PostsService::class, function ($app) {
            return new PostsService();
        });

        $this->app->bind(CommentsService::class, function ($app) {
            return new CommentsService();
        });
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
