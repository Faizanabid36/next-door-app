<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    protected $with = ['likes','dislikes'];

    public function scopeSectionPosts($query, $section = 'news-feed')
    {
        return $query->latest()->with('user')->whereSection($section)->paginate(10);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function likes()
    {
        return $this->hasMany(PostLike::class, 'post_id', 'id')->whereLikeDislike(1);
    }

    public function dislikes()
    {
        return $this->hasMany(PostLike::class, 'post_id', 'id')->where('like_dislike', '!=',1);
    }
}
