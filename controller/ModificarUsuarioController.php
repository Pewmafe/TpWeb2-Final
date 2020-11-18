<?php


class ModificarUsuarioController
{

    private $render;
    private $ModificarUsuarioModel;

    public function __construct($render, $ModificarUsuarioModel)
    {
        $this->render = $render;
        $this->ModificarUsuarioModel = $ModificarUsuarioModel;
    }

    public function ejecutar()
    {
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;
            if ($_SESSION["rol"] == "admin") {
                $data["usuarioAdmin"] = true;
            }
            $data["nombreUsuario"] = $_SESSION["nombreUsuario"];
            $data["contrasenia"] = $_SESSION["contrasenia"];
            $data["dni"] = isset($_SESSION["dni"]) ? $_SESSION["dni"] : false;
            $data["nombreEmpleado"] = isset($_SESSION["nombreEmpleado"]) ? $_SESSION["nombreEmpleado"] : false;
            $data["apellidoEmpleado"] = isset($_SESSION["apellidoEmpleado"]) ? $_SESSION["apellidoEmpleado"] : false;
            $data["licenciaEmpleado"] = isset($_SESSION["licenciaEmpleado"]) ? $_SESSION["licenciaEmpleado"] : false;

            $data["nombreExistente"] = isset($_GET["nombreExistente"]) ? $_GET["nombreExistente"] : false;
            $data["cambioNombre"] = isset($_GET["nombreUsuarioModificado"]) ? $_GET["nombreUsuarioModificado"] : false;
            $data["cambioPassword"] = isset($_GET["PasswordUsuarioModificado"]) ? $_GET["PasswordUsuarioModificado"] : false;
            $data["cambioNombreEmpleado"] = isset($_GET["nombreEmpleadoModificado"]) ? $_GET["nombreEmpleadoModificado"] : false;
            $data["cambioApellidoEmpleado"] = isset($_GET["apellidoEmpleadoModificado"]) ? $_GET["apellidoEmpleadoModificado"] : false;

            $usuarioEsEmpleado = $this->ModificarUsuarioModel->verificarSiUnUsuarioEsUnEmpleado($_SESSION["nombreUsuario"]);
            if($usuarioEsEmpleado){
                $data["usuarioEsEmpleado"] = true;
            }

            echo $this->render->render("view/modificarUsuarioView.php", $data);
            exit();
        }
        echo $this->render->render("view/modificarUsuarioView.php");
    }

    public function verificarQueUsuarioEsteLogeado()
    {
        $logeado = isset($_SESSION["logeado"]) ? $_SESSION["logeado"] : null;
        if ($logeado == 1) {
            return true;
        }
        return false;
    }

    public function modificarNombreUsuario()
    {
        $nombreUsuario = $_POST["nombre"];
        $nombreUsuarioExistente = $this->ModificarUsuarioModel->verificarNombreUsuarioExistente($nombreUsuario);
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;
            if ($_SESSION["rol"] == "admin") {
                $data["usuarioAdmin"] = true;
            }
            $data["nombreUsuario"] = $_SESSION["nombreUsuario"];
            if (!$nombreUsuarioExistente) {

                $this->ModificarUsuarioModel->modificarNombreUsuario($nombreUsuario);

            } else {
                header("Location: /modificarUsuario?nombreExistente=true");
                exit();
            }
            header("Location: /modificarUsuario?nombreUsuarioModificado=true");
            exit();
        }


    }

    public function modificarPasswordUsuario()
    {
        $contrasenia = $_POST["pass"];
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;
            if ($_SESSION["rol"] == "admin") {
                $data["usuarioAdmin"] = true;
            }
            $this->ModificarUsuarioModel->modificarContraseniaUsuario($contrasenia);

            header("Location: /modificarUsuario?PasswordUsuarioModificado=true");
            exit();
        }
    }


    public function modificarNombreEmpleado()
    {
        $nombre = $_POST["nombreEmpleado"];
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;
            if ($_SESSION["rol"] == "admin") {
                $data["usuarioAdmin"] = true;
            }
            $this->ModificarUsuarioModel->modificarNombreEmpleado($nombre);

            header("Location: /modificarUsuario?nombreEmpleadoModificado=true");
            exit();
        }
    }

    public function modificarApellidoEmpleado()
    {
        $apellido = $_POST["apellidoEmpleado"];
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;
            if ($_SESSION["rol"] == "admin") {
                $data["usuarioAdmin"] = true;
            }
            $this->ModificarUsuarioModel->modificarApellidoEmpleado($apellido);

            header("Location: /modificarUsuario?apellidoEmpleadoModificado=true");
            exit();
        }
    }

    public function modificarLicenciaEmpleado()
    {
        $tipoLicencia = $_POST["tipoLicencia"];
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;
            if ($_SESSION["rol"] == "admin") {
                $data["usuarioAdmin"] = true;
            }
            $this->ModificarUsuarioModel->modificarTipoLicenciaEmpleado($tipoLicencia);

            header("Location: /modificarUsuario?tipoLicenciaEmpleadoModificado=true");
            exit();
        }
    }
}