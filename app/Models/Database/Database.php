<?php

declare(strict_types = 1);

namespace App\Models\Database;

use PDO;

class Database
{
    public static function connection()
    {
        try {
           return new PDO("mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" .$_ENV['DB_DATABASE'], $_ENV['DB_USER'], $_ENV['DB_PASS']);
        } catch (\PDOException $e) {
            echo 'Connetction failed: ' . $e->getMessage();
        }
    }
}
