<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Mail\MailSender;
use App\Models\ContactUsModel;

class ContactUsController
{
    private $contactModel;

    public function __construct(ContactUsModel $contactModel)
    {
        $this->contactModel = $contactModel;
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Check if file type is valid
            $allowedFileTypes = array('image/jpeg', 'image/png', 'application/pdf', 
            'text/plain', 'application/vnd.ms-excel', 'application/zip');

            if (in_array($_FILES['file']['type'], $allowedFileTypes)) {
                $fileData = file_get_contents($_FILES["file"]["tmp_name"]);
            } else {
                return false;
            }
            $fileData = basename($_FILES["file"]["name"]);
            $fileData = file_get_contents($_FILES["file"]["tmp_name"]);

            // Validate name field
            if (empty($_POST['name'])) {
                $errors[] = 'Name is required';
            } else if (!preg_match("/^[a-zA-Z ]*$/", $_POST['name'])) {
                $errors[] = 'Name can only contain letters and spaces';
            }

            // Validate email field
            if (empty($_POST['email'])) {
                $errors[] = 'Email is required';
            } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Invalid email format';
            }

            $submitedPost = $_POST;
            $file['file'] = $fileData;

            $submitedData = array_merge($submitedPost, $file);

            try {
                if($this->contactModel->register($submitedData)) {
                    $mailSubject = 'This is contact us form data';
                    $email = 'w.wallace@gmail.com';
                    $headers = "From: $email\r\nReply-To: $email\r\n";
                    $mailSender = new MailSender($_ENV['ADMIN_EMAIL'], $mailSubject, serialize($submitedData), $headers);
                    $mailSender->send();
                }
            } catch (\Exception $e) {
                echo 'Message: ' .$e->getMessage();
            }
            
            return header('Location: /success-page'); 
        }
    }
    
    public function showAll()
    {
        return $this->contactModel->fetchAll();
    }
}
