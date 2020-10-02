<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportedPost extends Model
{
    //
    protected $guarded = [];

    public function reportedBy()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
