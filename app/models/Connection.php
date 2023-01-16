<?php
namespace app\models;

use PDO;

class Connection{
    public static function connect(){
        $pdo = new PDO("pgsql:host=10.4.3.151;port=5432;dbname=beto", "beto", "postgres");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
?>