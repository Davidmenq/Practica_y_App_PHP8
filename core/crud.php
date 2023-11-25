<?php
require_once("core/conexion.php");
class crud extends Conexion{
    private $pdo;
    public function __construct(
        public string $tabla
    ){
        parent::__construct();
        $this->pdo = $this->conexion(); 
    }

    public function consultarTodo(){
        try{
            $stm = $this->pdo->prepare("SELECT * FROM $this->tabla");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $mensaje){
            echo $mensaje->getMessage();
        }
    }

    public function consultarUno(int $id){
        try{
            $stm = $this->pdo->prepare("SELECT * FROM $this->tabla WHERE id=?");//para prevenir la inyeccion sql el dato id se verifica
            $stm->execute([$id]);//el dato requerido se env'ia a execute que es el que verifica
            return $stm->fetch(PDO::FETCH_OBJ);
        }catch(PDOException $mensaje){
            echo $mensaje->getMessage();
        }
    }

    public function delete(int $id){
        try{
            $stm = $this->pdo->prepare("DELETE FROM $this->tabla WHERE id=?"); //para prevenir la inyeccion sql el dato id se verifica
            $stm->execute([$id]);//el dato requerido se env'ia a execute que es el que verifica
        }catch(PDOException $mensaje){
            echo $mensaje->getMessage();
        }
    }

    public function crear(string $columnas, string $marcadores, array $datos){
        $stm = $this->pdo->prepare("INSERT INTO $this->tabla ($columnas) VALUES ($marcadores)");
        $stm->execute($datos);
    }

    public function modificacion(string $columnas, array $datos){
        $stm = $this->pdo->prepare("UPDATE $this->tabla SET $columnas WHERE id=?");
        $stm->execute($datos);
    }
}
?>