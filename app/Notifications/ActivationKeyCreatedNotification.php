<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ActivationKeyCreatedNotification extends Notification
{
    use Queueable;

    protected $activationKey;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($activationKey)
    {
        $this->activationKey = $activationKey;
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
                    ->subject('Kode Aktivasi Akun Anda!')
                    ->greeting('Hallo, '.$notifiable->username)
                    ->line('Anda perlu mengaktifkan email Anda sebelum Anda dapat mulai menggunakan semua layanan kami.')
                    ->action('Aktivasi Akun Anda', route('activation_key', ['activation_key' => $this->activationKey->activation_key, 'email' => $notifiable->email]))
                    ->line('Terimakasih Telah Menggunakan. '. config('app.name'));
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
