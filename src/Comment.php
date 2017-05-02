<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    const POST_ID = 0;
    protected $table = 'comments';

	protected $fillable = [
		'comment_content','post_id', 'user_id',
	];
    public static function boot()
        {
            parent::boot();

            static::creating(function ($model) {

                if (empty($model->user_id) && auth()->check()) {
                    $model->user_id = auth()->user()->id;
                }

            });

    }
    public function setParentIdAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['parent_id'] = $value;
        }
    }

    public function manageParentId(Request $request)
    {
        if (!empty($request->parent_id)) {

            $this->parent_id = $request->parent_id;
        }
    }

    public function scopeGetCommentById($query, $post_id) {

        return $query->where('post_id', $post_id);
    }
    public function scopeGetCommentByParentId($query, $parent_id) {

    return $query->where('parent_id', $parent_id);
    }
	/**
     * Get the user that owns the Term.
     */
    public function user()
    {
        return $this->belongsTo('Blog\User');
    }
	/**
     * Get the user that owns the Term.
     */
    public function post()
    {
        return $this->belongsTo('Blog\Post');
    }
	/**
     * Get the user that owns the Term.
     */
    public function parent()
    {
        return $this->belongsTo('Blog\Comment','id');
    }
    public function childcomment()
    {
        return $this->hasMany('Blog\Comment','id');
    }
}
