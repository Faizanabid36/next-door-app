<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostLiked extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public $operation;
    public $user;
    public $post;

    public function __construct($operation, $user, $post)
    {
        $this->operation = $operation;
        $this->user = $user;
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
            ->subject('Someone ' . $this->operation . ' on your post.')
            ->line(ucfirst($this->user->name) . ' ' . $this->operation . ' your post')
            ->action('View Post', route('single.post', $this->post->id))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'body' => ucfirst($this->operation . ' your post'),
            'url' => route('single.post', $this->post->id),
            'user' => $this->user,
            'type' => 'post-notification'
        ];
    }
}
