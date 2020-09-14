<?php

namespace App\Events;

use App\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $messageData;
    public $from;
    public $to;
    public $messageBody;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($messageData, $from, $to)
    {
        //
        $this->messageData = $messageData;
        $this->from = $from;
        $this->to = $to;
        $from_user = User::whereId($from)->first();
        $text = strlen($this->messageData['message']) > 35 ? substr($this->messageData['message'], 0, 35) . '...' : $this->messageData['message'];
        $this->messageBody =
            '<li id="user-' . $this->from . '">' .
            '<a href="' . route("user", $from) . '">' .
            '<span class="notification-avatar">' .
            '<img src="' . $from_user->avatar . '">' .
            '</span>' .
            '<div class="notification-text notification-msg-text">' .
            '<strong class="text-dark" style="font-size: 16px">' . $from_user->name . '</strong>' .
            '<br>' .
            '<p class="text-dark mt-0 mb-0"> <b>' .
            $text .
            '</b>' .
            '<span class="time-ago"> ' . $this->messageData['time'] . ' </span>' .
            '</p>' .
            '</div>' .
            '</a>' .
            '</li>';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return [
            new PrivateChannel('new-message.' . $this->to),
            new PrivateChannel('new-message.' . $this->from),
        ];
    }
}
