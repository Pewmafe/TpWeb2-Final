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
        echo $this->render->render("view/registroView.php");
    }

    public function registroUsuario()
    {
        $contrasenia = $_POST["contrasenia"];
        $nombreUsuario = $_POST["NombreUsuario"];

        $nombreUsuarioExistente = $this->registroModel->verificarNombreUsuarioExistente($nombreUsuario);
        if($nombreUsuarioExistente){
            $data["nombreUsuarioError"] = true;
            echo $this->render->render("view/registroView.php", $data);
            exit();
        }

        $this->registroModel->registrarUsuario($nombreUsuario, $contrasenia);
        $data["registroExitoso"] = true;

        echo $this->render->render("view/home.php",$data);
    }
}