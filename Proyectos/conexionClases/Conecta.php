<?php
class Database{
    private $host = "localhost";
    private $db_nombre = "Proyectos";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection(){
        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=".$this->host. ";db_nombre=".$this->db_nombre, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exeption){
            echo "Error de conexion: ".$exeption->getMessage();
        }
        return $this->conn;
    }
}




?>