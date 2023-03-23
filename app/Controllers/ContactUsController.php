<?php

declare(strict_types = 1);

namespace App\Controllers;

session_start();

use App\Mail\MailSender;
use App\Models\ContactUsModel;

class ContactUsController
{
    private $contactModel;

    private $submitedPost;

    private $submitedData;

    public function __construct(ContactUsModel $contactModel)
    {
        $this->contactModel = $contactModel;
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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

            $this->submitedPost = $_POST;
            $this->submitedData = $this->submitedPost;;

            // Check if file type is valid
            $allowedFileTypes = array('application/pdf');

            if(isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
                if (in_array($_FILES['file']['type'], $allowedFileTypes)) {
                    $fileData = basename($_FILES["file"]["name"]);
                    $fileData = file_get_contents($_FILES["file"]["tmp_name"]);
                    $attachmentPath = $_FILES['file']['tmp_name'];
                }

                $file['file'] = $fileData;

                $this->submitedData = array_merge($this->submitedPost, $file);
            }

            $lastInsertId = $this->contactModel->register($this->submitedData);

            try {
                if($lastInsertId) {
                    $mailer = new MailSender();
                    if (isset($attachmentPath)) {
                        $mailer->sendMail($this->submitedData, $attachmentPath);
                    } else {
                        $mailer->sendMail($this->submitedData);
                    }
                    
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
