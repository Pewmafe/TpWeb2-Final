<?php


class LoginController
{
    private $render;
    private $loginModel;
    private $loginSession;

    public function __construct($render, $loginSession, $loginModel)
    {
        $this->render = $render;
        $this->loginSession = $loginSession;
        $this->loginModel = $loginModel;
    }

    public function ejecutar()
    {
        $data["titulo"] = "Logueo";
        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;

            $data2 = $this->loginSession->verificarQueUsuarioRol();
            $dataMerge = array_merge($data, $data2);

            echo $this->render->render("view/loginView.php", $dataMerge);
            exit();
        }
        echo $this->render->render("view/loginView.php",$data);
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