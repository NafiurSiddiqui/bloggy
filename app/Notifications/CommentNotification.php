<?php

namespace App\Notifications;


use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class CommentNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    public function __construct(
        protected Post $post,

    ) {
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {

        $url = url('/post/' . $this->post->slug);
        return (new MailMessage)
            ->greeting('Yo,')
            ->line('You have a new comment on a post.')
            ->action('View Post', $url)
            ->line('Some one more line of texts.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'post_slug' => $this->post->slug,
            'message' => 'You have a new commment on a post.'
        ];
    }
}
