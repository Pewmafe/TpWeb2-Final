<?php


class RegistroEmpleadoController
{
    private $render;
    private $registroEmpleadoModel;
    private $loginSession;

    public function __construct($render ,$loginSession, $registroEmpleadoModel)
    {
        $this->render = $render;
        $this->loginSession = $loginSession;
        $this->registroEmpleadoModel = $registroEmpleadoModel;
    }

    public function ejecutar()
    {
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
        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
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
}