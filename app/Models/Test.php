<?php

declare(strict_types = 1);

namespace App\Models;

use App\Models\Model;

class Test extends Model
{
    public function test($vat)
    {
        // $stmt = $this->pdo->prepare('SELECT * FROM new_table');
        // $stmt->execute();
        // return $stmt->fetch();

        var_dump($vat);
    }
}
