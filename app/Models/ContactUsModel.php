<?php 

declare(strict_types = 1);

namespace App\Models;

use PDO;
use App\Models\Model;

class ContactUsModel extends Model
{
    public function register(array $contactData, array $file)
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO contact (name, surename, email, file, comments, gender, options) 
             VALUES (:name, :surname, :email, :file, :comments, :gender, :options)'
        );

        // Check if file type is valid
        $allowedTypes = array('image/jpeg', 'image/png', 'application/pdf', 'text/plain', 'application/msword', 'application/vnd.ms-excel', 'application/vnd.ms-powerpoint', 'application/zip', 'application/x-rar-compressed', 'application/octet-stream');
        if (in_array($file['file']['type'], $allowedTypes)) {
            $fileData = file_get_contents($file["file"]["tmp_name"]);
        } else {
            // handle invalid file type
            return false;
        }

        $fileData = basename($file["file"]["name"]);
        $fileData = file_get_contents($file["file"]["tmp_name"]);

        $stmt->bindParam(':name', $contactData['name']);
        $stmt->bindParam(':surname', $contactData['surname']);
        $stmt->bindParam(':email', $contactData['email']);
        $stmt->bindParam(':file', $fileData, PDO::PARAM_LOB);
        $stmt->bindParam(':comments', $contactData['comment']);
        $stmt->bindParam(':gender', $contactData['gender']);
        $stmt->bindParam(':options', $contactData['options']);
    
        $stmt->execute();
    
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