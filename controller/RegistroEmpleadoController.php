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
            $data["dniUsuarioError"]= isset($_GET["dniUsuarioError"]) ? $_GET["dniUsuarioError"] : false;
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
            $dni = $_POST["dni"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $fechaNacimiento = $_POST["fechaNacimiento"];
            $tipoLicencia = $_POST["tipoLicencia"];
            $rolAsignar =  $_POST["rolAsignar"];
            $nombreUsuario = $_POST["nombreUsuario"];

            $nombreUsuarioExistente = $this->registroEmpleadoModel->verificarNombreUsuarioExistente($nombreUsuario);
            $dniExistente = $this->registroEmpleadoModel->verificarDNIUsuarioExistente($dni);

            if(!$nombreUsuarioExistente and $dniExistente){
                header("Location: /registroEmpleado?nombreUsuarioError=true&dniUsuarioError=true");
                exit();
            }elseif ($dniExistente){
                header("Location: /registroEmpleado?dniUsuarioError=true");
                exit();
            }elseif (!$nombreUsuarioExistente){
                header("Location: /registroEmpleado?nombreUsuarioError=true");
                exit();
            }

            $this->registroEmpleadoModel->registrarEmpleado($dni,
                $nombre,
                $apellido,
                $fechaNacimiento,
                $tipoLicencia,
                $rolAsignar,
                $nombreUsuario);

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