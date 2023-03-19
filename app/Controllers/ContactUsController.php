<?php

declare(strict_types = 1);

namespace App\Controllers;

session_start();

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
                $fileData = basename($_FILES["file"]["name"]);
                $fileData = file_get_contents($_FILES["file"]["tmp_name"]);
            }
            
            // $fileData = basename($_FILES["file"]["name"]);
            // $fileData = file_get_contents($_FILES["file"]["tmp_name"]);

            // Validate name field
            if (empty($_POST['name'])) {
                $errors['name_error'] = 'Name is required';
            } else if (!preg_match("/^[a-zA-Z ]*$/", $_POST['name'])) {
                $errors[] = 'Name can only contain letters and spaces';
            }

            // Validate email field
            if (empty($_POST['email'])) {
                $errors['email_error'] = 'Email is required';
            } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Invalid email format';
            }

            if(!empty($errors)) {
                $_SESSION['errors'] = $errors;
                return header('Location: /contact-us');
            }

            $submitedPost = $_POST;
            $file['file'] = $fileData;

            $submitedData = array_merge($submitedPost, $file);
            $lastInsertId = $this->contactModel->register($submitedData);

            try {
                if($lastInsertId) {
                    $mailSubject = 'This is contact us form data';
                    $email = 'w.wallace@gmail.com';
                    $headers = "From: $email\r\nReply-To: $email\r\n";
                    $mailSender = new MailSender($_ENV['ADMIN_EMAIL'], $mailSubject, serialize($submitedData), $headers);
                    $mailSender->send();

                    return header('Location: /success-page'); 
                }
            } catch (\Exception $e) {
                echo 'Message: ' .$e->getMessage();
            }
        }
    }
    
    public function showAll()
    {
        return $this->contactModel->fetchAll();
    }
}
