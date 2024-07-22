<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMsg extends Mailable
{
    use Queueable, SerializesModels;

    public $fullname;
    public $surname;
    public $phone;
    public $email;
    public $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->fullname = $data['fullname'];
        $this->surname = $data['surname'];
        $this->phone = $data['phone'];
        $this->email = $data['email'];
        $this->text = $data['text'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Contact Message')
                    ->view('emails.mail');
    }
}
