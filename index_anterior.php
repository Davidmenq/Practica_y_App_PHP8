<?php
require_once("modelo/usuario.php");

print_r(PDO::getAvailableDrivers()); //queremos averiguar que controladores de base de datos tiene instalado PDO - PDO es una api para base de datos
echo "<hr>";
//EL sistema PDO consta de tres clases 
//1.PDO: se encarga de mantener la conexion a la base de datos
//2.PDO statement: maneja las sentencias sql y devuelve los resultados
//3.PDO Exception: manejo de errores

$usuario = new Usuario(
    0, 
    "Javier", 
    "Caceres", 
    "953852014",
    23);

//$usuario->insertar();
//$usuario->actualizar();
//$usuario->remover(); //solo esta manadando el id, asi que no importa el resto de datos del usuario
var_dump($usuario->consultarTodo());
echo "<hr>";
var_dump($usuario->consultarUno(2));

?>