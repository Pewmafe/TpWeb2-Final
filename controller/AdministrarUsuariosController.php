<?php


class AdministrarUsuariosController
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
            $data["bajaUsuario"]= isset($_GET["bajaUsuario"]) ? $_GET["bajaUsuario"] : false;
            $data["bajaEmpleado"]= isset($_GET["bajaEmpleado"]) ? $_GET["bajaEmpleado"] : false;

            $tablaUsuarios = $this->administrarUsuarioModel->obtenerUsuariosNoEmpleados();
            $tablaUsuariosEmpleados = $this->administrarUsuarioModel->obtenerUsuariosEmpleados();

            $data["tablaUsuarios"] = $tablaUsuarios;
            $data["tablaUsuariosEmpleados"] = $tablaUsuariosEmpleados;


            echo $this->render->render("view/administrarUsuariosView.php", $data);
            exit();
        }
        echo $this->render->render("view/administrarUsuariosView.php");
    }

    public function darDeBajaEmpleado(){
        $dniEmpleadoAEliminar = $_POST["botonDarDeBajaEmpleadoModal"];

        $this->administrarUsuarioModel->eliminarEmpleado($dniEmpleadoAEliminar);

        header("Location: /administrarUsuarios?bajaEmpleado=true");
        exit();
    }

    public function darDeBajaUsuario(){
        $idUsuarioAEliminar = $_POST["botonDarDeBajaUsuarioModal"];

        $this->administrarUsuarioModel->eliminarUsuario($idUsuarioAEliminar);

        header("Location: /administrarUsuarios?bajaUsuario=true");
        exit();
    }

    public function verificarQueUsuarioEsteLogeado(){
        $logeado = isset( $_SESSION["logeado"]) ?  $_SESSION["logeado"] : null;
        if($logeado == 1){
            return true;
        }
        return false;
    }
}