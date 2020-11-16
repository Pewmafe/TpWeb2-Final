<?php


class LoginController
{
    private $render;
    private $loginModel;

    public function __construct($render, $loginModel)
    {
        $this->render = $render;
        $this->loginModel = $loginModel;
    }

    public function ejecutar()
    {
        echo $this->render->render("view/loginView.php");
    }

    public function login()
    {
        $nombreUsuario = $_POST["Usuario"];
        $password = $_POST["Contrasenia"];
        $loginExitoso = $this->loginModel->logearUsuario($nombreUsuario, $password);

        if(!$loginExitoso){
            $data["loginError"] = "usuario o contrasenia incorrecto";
            echo $this->render->render("view/loginView.php", $data);
            exit();
        }
        $data["login"] = $loginExitoso;

        if($_SESSION["rol"] == 1){
            $data["usuarioAdmin"] = true;
        }

        echo $this->render->render("view/home.php", $data);
    }

    public function deslogearse()
    {
        session_destroy();
        echo $this->render->render("view/home.php");
    }
}