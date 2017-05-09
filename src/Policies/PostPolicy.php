<?php

namespace Blog\Policies;

use Blog\User;
use Blog\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view the post.
     *
     * @param  \Blog\User  $user
     * @param  \Blog\Post  $post
     * @return mixed
     */
    public function view(User $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \Blog\User  $user
     * @return mixed
     */
    public function create(User $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \Blog\User  $user
     * @param  \Blog\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \Blog\User  $user
     * @param  \Blog\Post  $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}
