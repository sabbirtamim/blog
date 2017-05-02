<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $table = 'terms';

	protected $fillable = [
		'name', 'slug','term_description', 'parent_id', 'user_id',  
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
    public function setSlugAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['slug'] = str_slug($value);
        }else{
            $this->attributes['slug']=str_slug($this->name);
        }
    }

    public function setTermDescriptionAttribute($value)
    {
        $this->attributes['term_description'] = htmlspecialchars($value);
    }
	/**
     * Get the user that owns the Term.
     */
    public function user()
    {
        return $this->belongsTo('Blog\User');
    }
    /**
     * Get the post for the user.
     */
    // public function post()
    // {
    //     return $this->hasMany('Blog\Post');
    // }
//     public function setSlugAttribute($slug){
//     $this->slug = $slug;
//     $this->attributes['slug'] = str_slug($this->slug , "-");
// }
}
