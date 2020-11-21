<?php


class RegistroEmpleadoController
{
    private $render;
    private $registroEmpleadoModel;

    public function __construct($render , $registroEmpleadoModel)
    {
        $this->render = $render;
        $this->registroEmpleadoModel = $registroEmpleadoModel;
    }

    public function ejecutar()
    {
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        if($logeado){
            $data["login"] = true;
            if($_SESSION["rol"] == "admin"){
                $data["usuarioAdmin"] = true;
            }

            $data["nombreUsuarioError"]= isset($_GET["nombreUsuarioError"]) ? $_GET["nombreUsuarioError"] : false;
            $data["registroExitoso"]= isset($_GET["registroExitoso"]) ? $_GET["registroExitoso"] : false;
            $data["nombreUsuario"]= isset($_GET["nombreUsuario"]) ? $_GET["nombreUsuario"] : false;

            echo $this->render->render("view/registroEmpleadoView.php", $data);
            exit();
        }
        echo $this->render->render("view/registroEmpleadoView.php");
    }

    public function registroEmpleado()
    {
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        if($logeado){

            $tipoLicencia = $_POST["tipoLicencia"];
            $rolAsignar =  $_POST["rolAsignar"];
            $nombreUsuario = $_POST["nombreUsuario"];

            $nombreUsuarioExistente = $this->registroEmpleadoModel->verificarNombreUsuarioExistente($nombreUsuario);

            if(!$nombreUsuarioExistente){
                header("Location: /registroEmpleado?nombreUsuarioError=true");
                exit();
            }

            $this->registroEmpleadoModel->registrarEmpleado($tipoLicencia, $rolAsignar, $nombreUsuario);

            $data["registroExitoso"] = true;
            header("Location: /registroEmpleado?registroExitoso=true");
            exit();
        }

    }

    public function verificarQueUsuarioEsteLogeado(){
        $logeado = isset( $_SESSION["logeado"]) ?  $_SESSION["logeado"] : null;
        if($logeado == 1){
            return true;
        }
        return false;
    }
}