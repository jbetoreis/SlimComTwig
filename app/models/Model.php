<?php
namespace app\models;
use app\models\Connection;

class Model{
    protected $con;
    public function __construct(){
        $this->con = Connection::connect();
    }

    public function all(){
        $sql = "select * from {$this->schema}.{$this->table}";
        $stmt = $this->con->query($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}
?>