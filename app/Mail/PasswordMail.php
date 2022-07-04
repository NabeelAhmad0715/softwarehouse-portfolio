<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordMail extends Mailable
{
    use Queueable, SerializesModels;
    public $newPassword;
    public $user;

    /**
     * Create a new message instance.
     *
     * @param $request
     */
    public function __construct($user, $newPassword)
    {
        //
        $this->user = $user;
        $this->newPassword = $newPassword;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.password')
            ->from('admin@petsaal.com')
            ->subject('Reset Password');
    }
}
