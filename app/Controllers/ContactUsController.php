<?php

declare(strict_types = 1);

namespace App\Controllers;

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
        $this->contactModel->register($_POST);
        return header('Location: /'); 
    }
    
    public function showAll()
    {
        return $this->contactModel->fetchAll();
    }
}
