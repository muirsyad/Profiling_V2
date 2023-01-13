<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Signup_ACC extends Mailable
{
    use Queueable, SerializesModels;


    public $name;
    public $url;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $url)
    {
        //
        $this->name = $name;
        $this->url = $url;
        // $this->email = $email;
        

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('signUp_ACCmail');

    }
}
