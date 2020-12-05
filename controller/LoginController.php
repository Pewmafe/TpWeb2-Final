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

        if (!$loginExitoso) {
            echo true;
            exit();
        }
    }

    public function deslogearse()
    {
        session_destroy();
        header("Location: /");
        exit();
    }
}