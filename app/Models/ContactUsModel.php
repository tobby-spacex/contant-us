<?php 

declare(strict_types = 1);

namespace App\Models;

use PDO;
use App\Models\Model;

class ContactUsModel extends Model
{
    public function register(array $contactData): string|false
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO contact (name, surename, email, file, comments, gender, options) 
             VALUES (:name, :surname, :email, :file, :comments, :gender, :options)'
        );

        $stmt->bindParam(':name', $contactData['name']);
        $stmt->bindParam(':surname', $contactData['surename']);
        $stmt->bindParam(':email', $contactData['email']);
        $stmt->bindParam(':file', $contactData['file'], PDO::PARAM_LOB);
        $stmt->bindParam(':comments', $contactData['comment']);
        $stmt->bindParam(':gender', $contactData['gender']);
        $stmt->bindParam(':options', $contactData['location']);
    
        $stmt->execute();
    
        return $this->pdo->lastInsertId();
    }

    public function fetchAll(): array
    {
        $stmt = $this->pdo->prepare(
            'SELECT * FROM contact'
        );

        $stmt->execute();
        $formData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $formData ? $formData : [];
    }
}