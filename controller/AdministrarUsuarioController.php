<?php


class AdministrarUsuarioController
{
    private $render;
    private $administrarUsuarioModel;

    public function __construct($render, $administrarUsuarioModel)
    {
        $this->render = $render;
        $this->administrarUsuarioModel = $administrarUsuarioModel;
    }

    public function ejecutar()
    {
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        if($logeado){
            $data["login"] = true;
            if($_SESSION["rol"] == "admin"){
                $data["usuarioAdmin"] = true;
            }

            $tablaUsuarios = $this->administrarUsuarioModel->obtenerUsuariosNoEmpleados();
            $tablaUsuariosEmpleados = $this->administrarUsuarioModel->obtenerUsuariosEmpleados();

            $data["tablaUsuarios"] = $tablaUsuarios;
            $data["tablaUsuariosEmpleados"] = $tablaUsuariosEmpleados;
            /*for ($i = 0; $i < sizeof($tablaUsuarios); $i++) {
                $data["tablaUsuarios"]["nombreUsuario"] = $tablaUsuarios[$i]["nombreUsuario"];
            }*/


            echo $this->render->render("view/administrarUsuariosView.php", $data);
            exit();
        }
        echo $this->render->render("view/administrarUsuariosView.php");
    }

    public function darDeBajaEmpleado(){
        $dniEmpleadoAEliminar = $_POST["botonDarDeBajaEmpleado"];

        $this->administrarUsuarioModel->eliminarEmpleado($dniEmpleadoAEliminar);

        $this->ejecutar();

    }

    public function verificarQueUsuarioEsteLogeado(){
        $logeado = isset( $_SESSION["logeado"]) ?  $_SESSION["logeado"] : null;
        if($logeado == 1){
            return true;
        }
        return false;
    }
}