<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailQuestion extends Mailable
{
    use Queueable, SerializesModels;

    public $username;
    public $tel;
    public $datalist;


    public function __construct($username, $tel, $datalist)
    {
        $this->username = $username;
        $this->tel = $tel;
        $this->datalist = $datalist;
    }

    public function build()
    {
        return $this->view('emails.email-question');
    }
}
