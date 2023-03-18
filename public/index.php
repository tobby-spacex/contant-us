<?php

declare(strict_types = 1);

use App\Models\ContactUsModel;
use App\Controllers\ContactUsController;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$urlRequest = $_SERVER['REQUEST_URI'];

define('VIEW_PATH', __DIR__ );

switch($urlRequest) {
    case '':
    case '/':
        include_once '../app/views/index.php';
        break;
    
    case '/contact-us':
        include_once '../app/views/contact/index.php';
        break;

    case '/contact-us/store':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contactModel = new ContactUsModel;
            $contactController = new ContactUsController($contactModel);
            $contactController->store($_POST);
        }
        break;

    case '/form-details':
        include_once '../app/views/contact/results/message.php';
        break;

    default:
        http_response_code(404);
        include_once '../app/views/404.php';
        break;    
}
