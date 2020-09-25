<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $guarded = [];

    public function interests()
    {
        return $this->hasMany(EventInterest::class, 'id', 'event_id');
    }
}
