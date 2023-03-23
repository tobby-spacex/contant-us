<?php

declare(strict_types = 1);

namespace App\Mail;

use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;

class MailSender
{
    public static function mailTransporter($email): void
    {
        $transport = Transport::fromDsn($_ENV['MAILER_DSN']);
        $mailer = new Mailer($transport);
        $mailer->send($email);
    }

    public function sendMail($data, $file=null): void
    {
       // Convert the input data to UTF-8
       $utf8Data = mb_convert_encoding($data, 'UTF-8', 'auto');

       // Encode the data as JSON
       $jsonData = json_encode($utf8Data, JSON_PRETTY_PRINT);

        if ($jsonData === false) {
            echo 'JSON encode failed: ' . json_last_error_msg();
            return;
        }

        $htmlData = htmlspecialchars($jsonData);

        $email = (new Email())
            ->from($_ENV['SUPPORT_EMAIL'])
            ->to($_ENV['ADMIN_EMAIL'])
            ->subject('New message from contact us!')
            ->text($jsonData)
            ->html($htmlData);

            // Check if $file is not null, and attach it if it is not
            if ($file !== null) {
                $email->attachFromPath($file, 'attachment-file');
            }

        self::mailTransporter($email);
    }
}
