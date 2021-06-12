<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactEmailRecived extends Mailable
{
    use Queueable, SerializesModels;
    public $EmailData;
    public function __construct($EmailData){
        $this->EmailData = $EmailData;
    }
    public function build()
    {
        return $this->markdown('mail/pages/contact/contact-email-recived')
                    ->subject('We Recived Your Email | Broadshop');
    }
}
