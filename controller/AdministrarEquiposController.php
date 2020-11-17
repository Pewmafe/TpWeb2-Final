<?php


class AdministrarEquiposController
{
    private $render;
    private $administrarEquiposModel;

    public function __construct($render, $administrarEquiposModel)
    {
        $this->render = $render;
        $this->administrarEquiposModel = $administrarEquiposModel;
    }

    public function ejecutar()
    {
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        if($logeado){
            $data["login"] = true;
            if($_SESSION["rol"] == "admin"){
                $data["usuarioAdmin"] = true;
            }
            $tablaCamiones = $this->administrarEquiposModel->obtenerCamiones();
            $tablaAcoplados = $this->administrarEquiposModel->obtenerAcoplados();

            $data['tablaCamiones'] = $tablaCamiones;
            $data['tablaAcoplados'] = $tablaAcoplados;
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