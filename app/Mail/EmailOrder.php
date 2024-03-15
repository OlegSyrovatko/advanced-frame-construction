<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $username;
    public $tel;
    public $link;
    public $comment;


    public function __construct($username, $tel, $link, $comment)
    {
        $this->username = $username;
        $this->tel = $tel;
        $this->link = $link;
        $this->comment = $comment;


    }

    public function build()
    {
        return $this->view('emails.email-order');
        /*
        return $this->view('emails.email-notification')
            ->subject('Новий контакт!')
            ->from('no-reply@afc.com.ua', 'Автовідповідач');
        */
    }
}
