<?php


class AdministrarEquiposController
{
    private $render;

    public function __construct($render)
    {
        $this->render = $render;
    }

    public function ejecutar()
    {
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        if($logeado){
            $data["login"] = true;
            if($_SESSION["rol"] == "admin"){
                $data["usuarioAdmin"] = true;
            }
            echo $this->render->render("view/administrarEquiposView.php", $data);
            exit();
        }
        echo $this->render->render("view/administrarEquiposView.php");
    }

    public function verificarQueUsuarioEsteLogeado(){
        $logeado = isset( $_SESSION["logeado"]) ?  $_SESSION["logeado"] : null;
        if($logeado == 1){
            return true;
        }
        return false;
    }
}