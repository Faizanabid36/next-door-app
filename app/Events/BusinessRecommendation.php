<?php

namespace App\Events;

use App\BusinessRecommendations;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BusinessRecommendation
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $businessOwner;
    public $recommendedBy;


    public function __construct(BusinessRecommendations $businessRecommendations)
    {
        //
        $this->recommendedBy = $businessRecommendations->recommended_by;
        $this->businessOwner = $businessRecommendations->business->with('business_owner')->first()->business_owner;
        $this->businessOwner->notify(new \App\Notifications\BusinessRecommendation($businessRecommendations));

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return [
            new PrivateChannel('recommendation-added-on-business.' . $this->businessOwner->id),
            new PrivateChannel('App.User.' . $this->businessOwner->id),
        ];
    }
}
