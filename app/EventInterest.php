<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventInterest extends Model
{
    //
    protected $guarded = [];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }
}
