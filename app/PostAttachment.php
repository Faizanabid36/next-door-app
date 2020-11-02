<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostAttachment extends Model
{
    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo(Post::class,'id','post_id');
    }
}
