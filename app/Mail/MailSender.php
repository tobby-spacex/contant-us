<?php

declare(strict_types = 1);

namespace App\Mail;

class MailSender
{
    protected $sendto;
    protected $subject;
    protected $message;
    protected $headers;

    public function __construct($sendto, $subject, $message, $headers = '')
    {
        $this->sendto = $sendto;
        $this->subject = $subject;
        $this->message = $message;
        $this->headers = $headers;
    }

    public function send()
    {
        $message = str_replace("\0", "", $this->message);

        return mail($this->sendto, $this->subject, $message, $this->headers);
    }
}
