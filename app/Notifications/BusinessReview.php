<?php

namespace App\Notifications;

use App\User;
use App\UserBusinessRecommendation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BusinessReview extends Notification implements ShouldQueue
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
        return ['database', 'mail'];
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
            ->action('Click to View', route('business.view_business_page', $this->business_id))
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
            'body' => ' left a review on your business page',
            'url' => route('business.view_business_page', $this->business_id),
            'user' => $this->user,
            'type' => 'review-notification'
        ];
    }
}
