<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // A Post Belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class,'id','user_id');
    }
}
