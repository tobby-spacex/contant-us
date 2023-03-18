<?php

declare(strict_types = 1);

namespace App\Mail;

class MailSender
{
    protected $subject;
    protected $message;
    protected $headers;

    public function __construct($subject, $message, $headers = '')
    {
        $this->subject = $subject;
        $this->message = $message;
        $this->headers = $headers;
    }

    public function send()
    {
        return mail($_ENV['ADMIN_EMAIL'], $this->subject, $this->message, $this->headers);
    }
}
