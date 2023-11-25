<?php
//CONTROL FRONTAL
if (!isset($_REQUEST["controlador"])){
    require_once("controlador/usuario_controlador.php");
    $controlador = new UsuarioControlador();
    $controlador->indexUsuario();
}else{
    $controlador = $_REQUEST["controlador"]; //el REQUEST es parte del modelo
    $accion = $_REQUEST["accion"];
    // $id= $_REQUEST["id"]; //solo fue para descartar error, al final el cache del navegador fue el error ctrl+f5 y arreglado
    // var_dump($id);
    // echo " desde index <hr>";

    require_once("controlador/$controlador"."_controlador.php"); //concatena una ruta generica mediante la variable $controlador
    $controlador=ucwords($controlador)."Controlador"; //cambia la primera letra de la palabra que se le pasa a Mayuscula
    $controlador = new $controlador;
    call_user_func([$controlador, $accion]); //ayuda a ejecutar funciones
}
?>