<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Blog;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Support\ServiceProvider;


/**
 * Description of BlogServiceProvider
 *
 * @author Tuhin
 */
class BlogServiceProvider extends ServiceProvider
{
    protected $defer = true;
    /**
     * List of command which will be registered.
     * @var array
     */
    protected $commands = [
    ];

    public function boot()
    {

        return $this->publishes([
            __DIR__ . '/config/blog.php' => config_path('blog.php')
        ], 'config');
         $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
         $this->loadViewsFrom(__DIR__ . '/../resources/views', 'blog'); 
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php'); 


    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/blog.php', 'blog'
        );

        if ($this->app->runningInConsole()) {
            $this->commands($this->commands);

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views')
            ], 'blog-views');

            $this->publishes([
                __DIR__ . '/../resources/assets' => public_path('')
            ], 'blog-views');

        }
    }

    public function provides()
    {
        return ['blog'];
    }
}