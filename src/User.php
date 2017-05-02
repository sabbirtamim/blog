<?php

namespace Blog;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

// $post->notify();
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'password', 'gender',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function scopeGetUsernameByUserId($query, $id) {

        $user_info= $query->where('id', $id);
        $user_info=$user_info->get();
        foreach ($user_info as $user_row) {
            return $user_row->username;
        }
    }
    /**
     * Get the terms_type for the user.
     */
    public function terms_type()
    {
        return $this->hasMany('Blog\Terms_type');
    }
    /**
     * Get the term for the user.
     */
    public function term()
    {
        return $this->hasMany('Blog\Term');
    }
    /**
     * Get the post for the user.
     */
    public function post()
    {
        return $this->hasMany('Blog\Post');
    }
    /**
     * Get the comment for the user.
     */
    public function comment()
    {
        return $this->hasMany('Blog\Comment');
    }
    /**
     * Get the comment for the user.
     */
    public function comment_parent()
    {
        return $this->hasMany('Blog\Comment','parent_id');
    }
    /**
     * The roles that belong to the user.
     */
    public function userRole()
    {
        return $this->hasMany('Blog\UserRole');
    }
}
