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
        $data["registroExitoso"]= isset($_GET["registroExitoso"]) ? $_GET["registroExitoso"] : false;
        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        if($logeado){
            $data["login"] = true;

            $usuarioAdmin = $this->loginSession->verificarQueUsuarioEsAdmin();
            if($usuarioAdmin){
                $data["usuarioAdmin"] = true;
                $data["usuarioChofer"] = true;
                $data["usuarioSupervisor"] = true;
            }

            $usuarioSupervisor = $this->loginSession->verificarQueUsuarioEsSupervisor();
            if($usuarioSupervisor){
                $data["usuarioSupervisor"] = true;
            }

            echo $this->render->render("view/home.php", $data);
            exit();
        }
       echo $this->render->render("view/home.php", $data);
    }
}