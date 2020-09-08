<?php

namespace App\Notifications;

use App\BusinessRecommendations;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BusinessRecommendation extends Notification implements ShouldQueue
{
    use Queueable;

    public $business_id = 0;
    public $user = [];

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(BusinessRecommendations $bc)
    {
        $this->user = $bc->recommended_by;
        $this->business_id = $bc->business_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your business was recommended.')
            ->line(ucfirst($this->user->name) . ' left a review on your business page')
            ->action('Click to View', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'body' => ' recommended your business page',
            'url' => route('business.view_business_page', $this->business_id),
            'user' => $this->user,
            'type' => 'recommendation-notification'
        ];
    }
}
