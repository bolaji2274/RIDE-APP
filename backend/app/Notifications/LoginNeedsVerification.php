<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoginNeedsVerification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [TwilioChannel::class];
    }

    // public function toTwilio(object $notifiable): TwilioMessage
    // {
    //     return (new TwilioMessage())
    //         ->content('Your login code is 123456');
    // }
    public function toTwilio($notifiable)
    {
        $loginCode = rand(111111, 999999);
        return (new TwilioSmsMessage())
            ->content("Your Andrewber login code is ")
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
