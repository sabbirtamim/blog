<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Post extends Model
{
    const THUMBNAIL_PATH = 'img';
    // const STATUS_PUBLISHED = 0;
    const STATUS_DRAFT = 'draft';
    const STATUS_PENDING = 'pending';
    const STATUS_SCHEDULED = 'scheduled';

    protected $table = 'posts';

    protected $fillable = [
        'user_id', 'content', 'title','publish_at', 'status', 'slug', 'comment_status', 'active','term_id',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {

            if (empty($model->user_id) && auth()->check()) {
                $model->user_id = auth()->user()->id;
            }

            // if (empty($model->status)) {
            //     $model->status = static::STATUS_PUBLISHED;
            // }

        });

    }

    public function setSlugAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['slug'] = str_slug($value);
        }else{
            $this->attributes['slug']=str_slug($this->title);
        }
    }
    
    public function setContentAttribute($value)
    {
        $this->attributes['content'] = htmlspecialchars($value);
    }

    // public function getContentAttribute()
    // {
    //     return htmlspecialchars_decode($this->content);
    // }

    public function scopeGetPostBySlug($query, $post_slug)
    {

        return $query->where('slug', $post_slug);
    }

    public function scopeGetPostIdBySlug($query, $post_slug)
    {

        $post_slug = $query->where('slug', $post_slug);
        $post_slug = $post_slug->get();
        foreach ($post_slug as $post_slug_row) {
            return $post_slug_row->id;
        }
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
    public function term()
    {
        return $this->belongsToMany('Blog\Term');
    }
    /**
     * Get the user that owns the Term.
     */
    // public function terms_type()
    // {
    //     return $this->belongsTo('Blog\Terms_type');
    // }
    /**
     * Get the comment for the user.
     */
    public function comment()
    {
        return $this->hasMany('Blog\Comment');
    }

    public function manageUpload(Request $request)
    {
        if ($request->hasFile('post_thumb') && $request->file('post_thumb')->isValid()) {
            $thumb = $request->file('post_thumb');
            $url = uniqid() . '.' . $thumb->getClientOriginalExtension();
            $thumb->move(public_path(static::THUMBNAIL_PATH), $url);
            $this->thumb_url = $url;
        }
        return false;
    }
    public function manageTerm(Request $request)
    {
        if ($request->term_id) {
        $comma_separated = (is_array($request->term_id))?implode(",", $request->term_id):$request->term_id;
            $this->term_id = $comma_separated;
        }
        return false;
    }

    public function manageStatus(Request $request)
    {
        if (!$request->publish_at==$request->updated_at) {
            $this->status = '0';
        }else{
            $this->status = '1';
        }
        return false;
    }

    public function getThumbnailUrl()
    {
        return url(static::THUMBNAIL_PATH) . '/' . $this->thumb_url;
    }

//     public function postNotification($query, $post_slug){
//         $post_slug = $query->where('slug', $post_slug);
//         $post = $post_slug->get();
// // {        $post=Post::find($post_slug);
//         $user=User::all();
//         foreach ($user->chunk(3) as  $users) {
//             foreach ($users as  $row) {
//             $row->notify(new PostNofification($post));
//             }
//         }
        
//         return false;
//     }

}
