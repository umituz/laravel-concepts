<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class ResetPasswordMail
 * @package App\Mail
 */
class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var
     */
    public $token;

    /**
     * Create a new message instance.
     *
     * @param $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.passwordReset')->with([
            'token' => $this->token
        ]);
    }
}
