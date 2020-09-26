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

    public function scopeIsGoing($query)
    {
        return $query->where('user_id', auth()->user()->id)->where('interested_or_going', 1)->count();
    }

    public function scopeIsMaybe($query)
    {
        return $query->where('user_id', auth()->user()->id)->where('interested_or_going', 2)->count();
    }

    public function scopeTotalGoing($query)
    {
        return $query->where('interested_or_going', 1)->count();
    }

    public function scopeTotalMaybe($query)
    {
        return $query->where('interested_or_going', 2)->count();
    }
}
