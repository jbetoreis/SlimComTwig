<?php
namespace app\models;
use app\models\Connection;

class Model{
    protected $con;
    public function __construct(){
        $this->con = Connection::connect();
    }
}
?>