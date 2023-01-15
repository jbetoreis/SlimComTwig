<?php
namespace app\models;

use PDO;

class Connection{
    public static function connect(){
        $pdo = new PDO("pgsql:host=localhost;dbname=twig_slim;charset=utf8", "postgres", "admin");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
?>