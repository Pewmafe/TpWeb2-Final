<?php

class HomeController
{
    private $render;
    private $loginSession;

    public function __construct($render, $loginSession)
    {
        $this->render = $render;
        $this->loginSession = $loginSession;
    }

    public function ejecutar()
    {
        $data["registroExitoso"] = isset($_GET["registroExitoso"]) ? $_GET["registroExitoso"] : false;
        $data["titulo"] = "Inicio";
        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;

            $data2 = $this->loginSession->verificarQueUsuarioRol();
            $dataMerge = array_merge($data, $data2);

            echo $this->render->render("view/home.php", $dataMerge);
            exit();
        }
        echo $this->render->render("view/home.php", $data);
    }
}