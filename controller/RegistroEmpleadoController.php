<?php


class RegistroEmpleadoController
{
    private $render;

    public function __construct($render)
    {
        $this->render = $render;
    }

    public function ejecutar()
    {
        $logeado = isset( $_SESSION["logeado"]) ?  $_SESSION["logeado"] : null;
        if($logeado == 1){
            $data["login"] = true;
            if($_SESSION["rol"] == 1){
                $data["usuarioAdmin"] = true;
            }
            echo $this->render->render("view/registroEmpleadoView.php", $data);
            exit();
        }
        echo $this->render->render("view/registroEmpleadoView.php");
    }
}