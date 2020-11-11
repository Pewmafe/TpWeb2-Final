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
        $usuario = $_POST["Usuario"];
        $password = $_POST["Contrasenia"];
        $result = $this->loginModel->logearUsuario($usuario, $password);
        $data["login"] = $result;
        echo $this->render->render("view/home.php", $data);
    }

    public function deslogearse()
    {
        session_destroy();
        echo $this->render->render("view/home.php");
    }
}