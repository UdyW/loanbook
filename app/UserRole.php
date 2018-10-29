<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    public $table = 'user_role';
    public function users()
    {
        return $this->belongsToMany(User::class,'user_user_role','user_role_id','user_id');
    }
}
