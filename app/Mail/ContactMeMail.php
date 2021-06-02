<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Define properties.
     *
     * @var mixed
     */
    public $data;

    /**
     * Create a new message instance.
     *
     * @param mixed $data
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contactme')
                    ->subject('Message from "'.$this->data->email.'" at '.date('Y-m-d H:i'))
                    ->to('ibnuhalimm@gmail.com');
    }
}
