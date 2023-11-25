<?php
require_once("modelo/usuario.php"); // ya no se necesita volver con .. a la raiz porque ya se indica en el index
class UsuarioControlador extends Usuario{

    public function __construct(){
        parent::__construct();  
    }

    public function indexUsuario(){
        require_once("vista/usuarios.php");
    }
    public function mostrarUsuario(){
        //$id = $_REQUEST["id"]; //se mando al if y a consultarUno de forma directa

        if(isset($_REQUEST["id"])){ //verifica que no este vacio
            $usuario = $this->consultarUno($_REQUEST["id"]);
        }else{
            $usuario = $this; //la instancia se hereda
        }
        require_once("vista/usuario_formulario.php");
    }

    public function guardar(){
        $this->id = $_REQUEST["id"];
        $this->nombre = $_REQUEST["nombre"];
        $this->apellido = $_REQUEST["apellido"];
        $this->telefono = $_REQUEST["telefono"];
        $this->edad = $_REQUEST["edad"];

        $this->id>0?$this->actualizar():$this->insertar(); //verifica si existe el id actualiza, de lo contrario inserta

        header("Location:index.php"); //redirecciona al index
    }

    public function eliminar(){
        $this->delete($_REQUEST["id"]);
        header("Location:index.php");
    }
}
?>