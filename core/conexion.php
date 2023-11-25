<?php

//CONEXION A LA BASE DE DATOS MYSQL CON PDO
class Conexion{
    public function __construct(
        public string $driver = "mysql",
        public string $host = "localhost",
        public string $port = "3308",
        public string $user = "root",
        public string $pass = "",
        public string $dbName = "sunny_side",
        public string $charset = "utf8",
    ){

    }

    protected function conexion(){
        try{
            $pdo = new PDO("$this->driver:host=$this->host;port=$this->port;dbname=$this->dbName;charset=$this->charset", $this->user, $this->pass);
            return $pdo;
        }catch(PDOException $mensaje){
            echo $mensaje->getMessage();
        }
    } 
}
?>