<?php

class DB{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "CMS";

    public function connect(){
        try{
            $con = new PDO("mysql:host=$this->host;dbname=$this->db;", $this->username, $this->password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        }catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }
}
?>