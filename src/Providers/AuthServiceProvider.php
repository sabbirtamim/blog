<?php

namespace Blog\Providers;
use Blog\Post;
use Blog\Policies\PostPolicy;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Blog\Model' => 'Blog\Policies\ModelPolicy',
        Post::class => PostPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('update', function ($user, $post) {
        // return $user->id == $post->user_id;
    // });
    }
}
