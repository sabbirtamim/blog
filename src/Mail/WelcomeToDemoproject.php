<?php

namespace Blog\Mail;
use Blog\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeToDemoproject extends Mailable
{
    use Queueable, SerializesModels;

    public $name= 'Sabbir';
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    return $this->from('noreply@tuhinbepari.com')
                ->view('emails.welcome');
        // return $this->view('emails.welcome');
    }
}
