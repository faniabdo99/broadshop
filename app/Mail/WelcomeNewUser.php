<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeNewUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */   
    public $EmailData;
    public function __construct($EmailData){
        $this->EmailData = $EmailData;
    }
    public function build(){
        return $this->markdown('mail/user/welcome-new-user');
    }
}
