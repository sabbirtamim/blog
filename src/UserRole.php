<?php

namespace blog;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'user_roles';

	protected $fillable = [
		'user_id', 'role_id',  
	];

    /**
     * Get the comment for the user.
     */
    public function user()
    {
        return $this->belongsTo('blog\User');
    }
    /**
     * Get the comment for the user.
     */
    public function role()
    {
        return $this->belongsTo('blog\Role');
    }
}
