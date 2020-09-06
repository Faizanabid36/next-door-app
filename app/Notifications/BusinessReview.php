<?php

namespace App\Notifications;

use App\User;
use App\UserBusinessRecommendation;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BusinessReview extends Notification
{
    use Queueable;

//    public $review;
    public $user_id = 0;
    public $business_id = 0;
    public $review = '';
    public $user = [];

    /**
     * Create a new notification instance.
     *
     * @param UserBusinessRecommendation $review
     */
    public function __construct(UserBusinessRecommendation $review)
    {
        //
        $this->user_id = $review->user_id;
        $this->business_id = $review->business_id;
        $this->review = $review->review;
        $this->user = User::whereId($this->user_id)->first();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('A new review was added to your business.')
            ->line(ucfirst($this->user->name) . ' left a review on your business page')
            ->action('Click to View', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function toDatabase($notifiable)
    {
        return [
            'review' => $this->review,
            'user_id' => $this->user_id,
            'business_id' => $this->business_id,
            'user' => $this->user,
        ];
    }
}
