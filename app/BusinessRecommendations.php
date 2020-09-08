<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessRecommendations extends Model
{
    //
    protected $guarded = [];
    protected $with = ['recommended_by', 'business'];

    public function recommended_by()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function business()
    {
        return $this->belongsTo(Business::class, 'business_id', 'id');
    }
}
