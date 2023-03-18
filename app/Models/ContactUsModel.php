<?php 

declare(strict_types = 1);

namespace App\Models;

use PDO;
use App\Models\Model;

class ContactUsModel extends Model
{
    public function register(array $contactData)
    {
        // var_dump($contactData);
        $name = $contactData['name'];
        $surename = $contactData['surename'];
        $email = $contactData['email'];
        $file = $contactData['file'];
        $comment = $contactData['comment'];
        $gender = $contactData['gender'];
        $options = $contactData['options'];

        $stmt = $this->pdo->prepare(
            'INSERT INTO contact (name, surename, email, file, comments, gender, options) 
            VALUES (?, ?, ?, ?, ?, ?, ?)'
        );

        $stmt->execute([$name , $surename, $email, $file, $comment, $gender, $options]);
        return $this->pdo->lastInsertId();
    }

    public function fetchAll()
    {
        $stmt = $this->pdo->prepare(
            'SELECT * FROM contact'
        );

        $stmt->execute();
        $formData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $formData ? $formData : [];
    }
}