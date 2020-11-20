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

        echo $this->render->render("view/registroView.php", $data);
    }

    public function registroUsuario()
    {
        $contrasenia = $_POST["contrasenia"];
        $nombreUsuario = $_POST["NombreUsuario"];

        $nombreUsuarioExistente = $this->registroModel->verificarNombreUsuarioExistente($nombreUsuario);
        if($nombreUsuarioExistente){
            header("Location: /registro?nombreUsuarioExistente=true");
            exit();
        }

        $this->registroModel->registrarUsuario($nombreUsuario, $contrasenia);

        header("Location: /home?registroExitoso=true");
        exit();
    }
}