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
        $data["loginError"]= isset($_GET["loginError"]) ? $_GET["loginError"] : false;

        echo $this->render->render("view/loginView.php", $data);
    }

    public function login()
    {
        $nombreUsuario = $_POST["Usuario"];
        $password = $_POST["Contrasenia"];
        $loginExitoso = $this->loginModel->logearUsuario($nombreUsuario, $password);

        if(!$loginExitoso){
            header("Location: /login?loginError=true");
            exit();
        }
        header("Location: /");
    }

    public function deslogearse()
    {
        session_destroy();
        header("Location: /");
        exit();
    }
}