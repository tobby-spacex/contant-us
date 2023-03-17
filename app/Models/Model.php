<?php 

declare(strict_types = 1);

namespace App\Models;

use App\Models\Database\Database;

abstract class Model 
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Database::connection();
    }
}
