<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Question;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use App\Answer;
use Illuminate\Http\Request;
class NotifyUpdatePost extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $UpdateAnswerRequest = Request::capture();
        $UpdateAnswerPath = $UpdateAnswerRequest->path();
        $StringPathUpdate = explode("/", $UpdateAnswerPath);
        return (new MailMessage)
            ->line('An answer to your question is updated')
            ->action('Have a look', \route('questions.show', $StringPathUpdate[1]))
            ->line('Keep answering!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}