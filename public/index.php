<?php

declare(strict_types = 1);

use App\Models\ContactUsModel;
use App\Controllers\ContactUsController;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$urlRequest = $_SERVER['REQUEST_URI'];
define('VIEW_PATH', __DIR__ );

switch ($urlRequest) {
    case '':
    case '/':
        $viewPath = '../app/views/index.php';
        break;
    
    case '/contact-us':
        $viewPath = '../app/views/contact/index.php';
        break;

    case '/contact-us/store':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contactModel = new ContactUsModel;
            $contactController = new ContactUsController($contactModel);
            $contactController->store($_POST);
            $viewPath = '../app/views/contact/results/message.php';
        } else {
            http_response_code(405);
            $viewPath = '../app/views/405.php';
        }
        break;
    
    case '/form-details':
        $viewPath = '../app/views/contact/results/message.php';
        break;

    case '/success-page':
        $viewPath = '../app/views/contact/results/success-page.php';
        break;

    default:
        http_response_code(404);
        $viewPath = '../app/views/404.php';
        break;
}

include_once $viewPath;
