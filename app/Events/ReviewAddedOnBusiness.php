<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReviewAddedOnBusiness implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $review;
    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($review, $user)
    {
        $this->review = $review;
        $this->user = $user;
        $this->user->notify(new \App\Notifications\BusinessReview($review));
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return [
            new PrivateChannel('review-added-on-business.' . $this->user->id),
            new PrivateChannel('App.User.' . $this->user->id),
        ];
    }
}
