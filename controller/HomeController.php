<?php

class HomeController
{
    private $render;

    public function __construct($render)
    {
        $this->render = $render;
    }

    public function ejecutar()
    {
        $data["registroExitoso"]= isset($_GET["registroExitoso"]) ? $_GET["registroExitoso"] : false;
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        if($logeado){
            $data["login"] = true;
            if($_SESSION["rol"] == "admin"){
                $data["usuarioAdmin"] = true;
            }
            
            echo $this->render->render("view/home.php", $data);
            exit();
        }
       echo $this->render->render("view/home.php", $data);
    }

    public function verificarQueUsuarioEsteLogeado(){
        $logeado = isset( $_SESSION["logeado"]) ?  $_SESSION["logeado"] : null;
        if($logeado == 1){
            return true;
        }
        return false;
    }
}