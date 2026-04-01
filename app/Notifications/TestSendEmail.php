<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TestSendEmail extends Notification
{
   use Queueable;    public $token;

    /**
     * Create a new notification instance.
     */
    public function __construct($token)
    {
        $this->token = $token;
    }
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url(route('password.reset', [
        'token' => $this->token,
        'email' => $notifiable->getEmailForPasswordReset(),
    ], false));

        return (new \Illuminate\Notifications\Messages\MailMessage)
        ->subject('Thông báo đặt lại mật khẩu - ' . config('app.name')) 
        ->greeting('Chào bạn ' . $notifiable->name . '!')
        ->line('Chúng tôi nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.')
        ->action('Đặt lại mật khẩu', $url)
        ->line('Nếu bạn không yêu cầu, vui lòng bỏ qua email này.')
        ->salutation('Trân trọng, Đội ngũ hỗ trợ.');    }

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
