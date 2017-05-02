<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

	protected $fillable = [
		'name','description',  
	];
    /**
     * The roles that belong to the user.
     */
    public function userRole()
    {
        return $this->hasMany('Blog\UserRole');
    }
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = htmlspecialchars($value);
    }
}
