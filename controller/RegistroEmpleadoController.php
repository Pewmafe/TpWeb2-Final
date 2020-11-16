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
            echo $this->render->render("view/registroEmpleadoView.php", $data);
            exit();
        }
        echo $this->render->render("view/registroEmpleadoView.php");
    }

    public function registroEmpleado()
    {
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        if($logeado){
            $data["login"] = true;
            if($_SESSION["rol"] == "admin"){
                $data["usuarioAdmin"] = true;
            }

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
                $data["dniUsuarioError"] = "El dni de empleado ya existe";
                $data["nombreUsuarioError"] = "El nombre de usuario no existe";
                echo $this->render->render("view/registroEmpleadoView.php", $data);
                exit();
            }elseif ($dniExistente){
            $data["dniUsuarioError"] = "El dni de empleado ya existe";
            echo $this->render->render("view/registroEmpleadoView.php", $data);
            exit();
            }elseif (!$nombreUsuarioExistente){
                $data["nombreUsuarioError"] = "El nombre de usuario no existe";
                echo $this->render->render("view/registroEmpleadoView.php", $data);
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
            echo $this->render->render("view/home.php", $data);
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