<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $username;
    public $tel;
    public $area;
    public $comment;


    public function __construct($username, $tel, $area, $comment)
    {
        $this->username = $username;
        $this->tel = $tel;
        $this->area = $area;
        $this->comment = $comment;


    }

    public function build()
    {
        return $this->view('emails.email-notification');
        /*
        return $this->view('emails.email-notification')
            ->subject('Новий контакт!')
            ->from('no-reply@afc.com.ua', 'Автовідповідач');
        */
    }
}
