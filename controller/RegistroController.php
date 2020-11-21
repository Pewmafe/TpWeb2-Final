<?php


class RegistroController
{
    private $render;
    private $registroModel;

    public function __construct($render, $registroModel)
    {
        $this->render = $render;
        $this->registroModel = $registroModel;
    }

    public function ejecutar()
    {
        $data["nombreUsuarioExistente"]= isset($_GET["nombreUsuarioExistente"]) ? $_GET["nombreUsuarioExistente"] : false;
        $data["dniUsuarioExistente"]= isset($_GET["dniUsuarioExistente"]) ? $_GET["dniUsuarioExistente"] : false;

        echo $this->render->render("view/registroView.php", $data);
    }

    public function registroUsuario()
    {
        $nombreUsuario = $_POST["NombreUsuario"];
        $dni = $_POST["dni"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $fechaNacimiento = $_POST["fechaNacimiento"];
        $contrasenia = $_POST["contrasenia"];

        $nombreUsuarioExistente = $this->registroModel->verificarNombreUsuarioExistente($nombreUsuario);
        $dniExistente = $this->registroModel->verificarDNIUsuarioExistente($dni);

        if($nombreUsuarioExistente and $dniExistente){
            header("Location: /registro?nombreUsuarioExistente=true&dniUsuarioExistente=true");
            exit();
        }elseif ($dniExistente){
            header("Location: /registro?dniUsuarioExistente=true");
            exit();
        }elseif ($nombreUsuarioExistente){
            header("Location: /registro?nombreUsuarioExistente=true");
            exit();
        }

        $this->registroModel->registrarUsuario($nombreUsuario, $contrasenia, $dni, $nombre, $apellido, $fechaNacimiento);

        header("Location: /home?registroExitoso=true");
        exit();
    }
}