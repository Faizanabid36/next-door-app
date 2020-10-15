<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function scopeSectionPosts($query,$section = 'news-feed')
    {
        return $query->latest()->with('user')->whereSection($section)->paginate(12);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
