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
            $data["nombreUsuarioExistente"]= isset($_GET["nombreUsuarioExistente"]) ? $_GET["nombreUsuarioExistente"] : false;
            $data["dniExistente"]= isset($_GET["dniExistente"]) ? $_GET["dniExistente"] : false;
            $data["modificarUsuario"]= isset($_GET["modificarUsuario"]) ? $_GET["modificarUsuario"] : false;

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
        $idEmpleadoAEliminar = $_POST["botonDarDeBajaEmpleadoModal"];

        $this->administrarUsuarioModel->eliminarEmpleado($idEmpleadoAEliminar);

        header("Location: /administrarUsuarios?bajaEmpleado=true");
        exit();
    }

    public function darDeBajaUsuario(){
        $dniUsuarioAEliminar = $_POST["botonDarDeBajaUsuarioModal"];

        $this->administrarUsuarioModel->eliminarUsuario($dniUsuarioAEliminar);

        header("Location: /administrarUsuarios?bajaUsuario=true");
        exit();
    }

    public function modificarUsuario(){
        $nombreUsuarioAModificar = $_POST["nombreUsuario"];
        $nombreModificar = $_POST["nombre"];
        $apellidoAModificar = $_POST["apellido"];
        $dniAModificar = $_POST["dni"];
        $fechaNacimientoAModificar = $_POST["fechaNacimiento"];
        $dniUsuarioQueSeVaAModificar = $_POST["botonModificar"];

        $nombreUsuarioExistente=$this->administrarUsuarioModel->verificarNombreUsuarioExistente($nombreUsuarioAModificar,$dniUsuarioQueSeVaAModificar);
        $dniExistente=$this->administrarUsuarioModel->verificarDNIUsuarioExistente($dniAModificar, $dniUsuarioQueSeVaAModificar);

        if($nombreUsuarioExistente and $dniExistente){
            header("Location: /administrarUsuarios?nombreUsuarioExistente=true&dniExistente=true");
            exit();
        }elseif ($nombreUsuarioExistente){
            header("Location: /administrarUsuarios?nombreUsuarioExistente=true");
            exit();
        }elseif ($dniExistente){
            header("Location: /administrarUsuarios?dniExistente=true");
            exit();
        }

        $this->administrarUsuarioModel->modificarUsuario($nombreUsuarioAModificar,
            $nombreModificar, $apellidoAModificar, $dniAModificar, $fechaNacimientoAModificar);

        header("Location: /administrarUsuarios?modificarUsuario=true");
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