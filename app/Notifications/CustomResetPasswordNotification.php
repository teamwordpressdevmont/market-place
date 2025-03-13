<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Crypt;

class CustomResetPasswordNotification extends ResetPasswordNotification
{
    /**
     * Create a new notification instance.
     *
     * @param string $token
     * @return void
     */
    public function __construct($token, $encodedEmail)
    {
        parent::__construct($token);
        $this->encodedEmail = $encodedEmail;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        // Reverse URL-safe Base64 encoding: Replace URL-safe characters back to normal Base64
        $encodedEmail = strtr($this->encodedEmail, '-_', '+/');
        
        // Decode the Base64 string
        $decodedEmail = base64_decode($encodedEmail);

        // Decrypt the email
        $email = Crypt::decryptString($decodedEmail);


        // Customize the URL here
        $resetLink = url(config('app.url').route('password.reset', ['token' => $this->token, 'email' => urlencode($this->encodedEmail)], false));

        return (new MailMessage)
            ->subject('Reset Password Notification')
            ->line('You are receiving this email because we received a password reset request for your account.')
            ->action('Reset Password', $resetLink)
            ->line('This password reset link will expire in 60 minutes.')
            ->line('If you did not request a password reset, no further action is required.');
    }
}
