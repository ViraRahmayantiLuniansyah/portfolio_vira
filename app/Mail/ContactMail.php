<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject($this->data['subject'])
                    ->view('emails.contact')
                    ->with([
                        'nama' => $this->data['nama'],
                        'email' => $this->data['email'],
                        'subject' => $this->data['subject'],
                        'pesan' => $this->data['pesan'],
                    ]);
    }
}