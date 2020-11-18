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
            $data["dniEmpleado"] = $_SESSION["dniEmpleado"];
            $data["nombreEmpleado"] = $_SESSION["nombreEmpleado"];
            $data["apellidoEmpleado"] = $_SESSION["apellidoEmpleado"];
            $data["licenciaEmpleado"] = $_SESSION["licenciaEmpleado"];
            $data["nacimientoEmpleado"] = $_SESSION["nacimientoEmpleado"];

            $data["nombreExistente"] = isset($_GET["nombreExistente"]) ? $_GET["nombreExistente"] : false;
            $data["cambioNombre"] = isset($_GET["nombreUsuarioModificado"]) ? $_GET["nombreUsuarioModificado"] : false;
            $data["cambioPassword"] = isset($_GET["PasswordUsuarioModificado"]) ? $_GET["PasswordUsuarioModificado"] : false;
            $data["cambioNombreEmpleado"] = isset($_GET["nombreEmpleadoModificado"]) ? $_GET["nombreEmpleadoModificado"] : false;
            $data["cambioApellidoEmpleado"] = isset($_GET["apellidoEmpleadoModificado"]) ? $_GET["apellidoEmpleadoModificado"] : false;
            $data["licenciaEmpleadoModificado"] = isset($_GET["licenciaEmpleadoModificado"]) ? $_GET["licenciaEmpleadoModificado"] : false;
            $data["dniEmpleadoModificado"] = isset($_GET["dniEmpleadoModificado"]) ? $_GET["dniEmpleadoModificado"] : false;
            $data["nacimientoEmpleadoModificado"] = isset($_GET["nacimientoEmpleadoModificado"]) ? $_GET["nacimientoEmpleadoModificado"] : false;


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
        $licencia = $_POST["licenciaEmpleado"];
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;
            if ($_SESSION["rol"] == "admin") {
                $data["usuarioAdmin"] = true;
            }
            $this->ModificarUsuarioModel->modificarLicenciaEmpleado($licencia);

            header("Location: /modificarUsuario?licenciaEmpleadoModificado=true");
            exit();
        }
    }
    public function modificarDniEmpleado()
    {
        $dniEmpleado = $_POST["dniEmpleado"];
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;
            if ($_SESSION["rol"] == "admin") {
                $data["usuarioAdmin"] = true;
            }
            $this->ModificarUsuarioModel->modificarDniEmpleado($dniEmpleado);

            header("Location: /modificarUsuario?dniEmpleadoModificado=true");
            exit();
        }
    }
    public function modificarNacimientoEmpleado()
    {
        $nacimiento = $_POST["nacimientoEmpleado"];
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;
            if ($_SESSION["rol"] == "admin") {
                $data["usuarioAdmin"] = true;
            }
            $this->ModificarUsuarioModel->modificarNacimientoEmpleado($nacimiento);

            header("Location: /modificarUsuario?nacimientoEmpleadoModificado=true");
            exit();
        }
    }
}