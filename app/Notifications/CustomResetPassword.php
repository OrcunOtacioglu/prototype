<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CustomResetPassword extends Notification
{
    use Queueable;

    public $token;

    /**
     * CustomResetPassword constructor.
     *
     * @param $token
     */
    public function __construct($token)
    {
        $this->token = $token;
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
        return (new MailMessage)
                    ->subject('Parola Sıfırlama Talebi')
                    ->from('bilgi@neredeysenorada.com', 'Neredeysen Orada')
                    ->greeting('Merhaba!')
                    ->line('Bu maili parola sıfırlama talebinde bulunduğunuz için alıyorsunuz.')
                    ->action('Parolamı Sıfırla', url(env('APP_URL').route('password.reset', $this->token, false)))
                    ->line('Bu yönde bir talebiniz olmamışsa, herhangi bir işlem yapmanıza gerek yoktur!')
                    ->salutation('Saygılarımızla,');
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
