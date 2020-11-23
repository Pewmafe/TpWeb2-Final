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

            $data["dniUsuario"] = $_SESSION["dniUsuario"];
            $data["nombreDelUsuario"] = $_SESSION["nombre"];
            $data["apellidoUsuario"] = $_SESSION["apellido"];
            $data["licenciaEmpleado"] = $_SESSION["licenciaEmpleado"];
            $data["nacimientoUsuario"] = $_SESSION["fecha_nacimiento"];


            $data["nombreExistente"] = isset($_GET["nombreExistente"]) ? $_GET["nombreExistente"] : false;
            $data["dniExistente"] = isset($_GET["dniExistente"]) ? $_GET["dniExistente"] : false;
            $data["cambioNombre"] = isset($_GET["nombreUsuarioModificado"]) ? $_GET["nombreUsuarioModificado"] : false;
            $data["cambioPassword"] = isset($_GET["PasswordUsuarioModificado"]) ? $_GET["PasswordUsuarioModificado"] : false;
            $data["cambioNombreDelUsuario"] = isset($_GET["nombreDelUsuarioModificado"]) ? $_GET["nombreDelUsuarioModificado"] : false;
            $data["cambioApellidoUsuario"] = isset($_GET["apellidoUsuarioModificado"]) ? $_GET["apellidoUsuarioModificado"] : false;
            $data["licenciaEmpleadoModificado"] = isset($_GET["licenciaEmpleadoModificado"]) ? $_GET["licenciaEmpleadoModificado"] : false;
            $data["cambioDniUsuario"] = isset($_GET["dniUsuarioModificado"]) ? $_GET["dniUsuarioModificado"] : false;
            $data["cambioNacimientoUsuario"] = isset($_GET["nacimientoUsuarioModificado"]) ? $_GET["nacimientoUsuarioModificado"] : false;

            $usuarioEsEmpleado = $this->ModificarUsuarioModel->verificarSiUnUsuarioEsUnEmpleado($_SESSION["nombreUsuario"]);
            if ($usuarioEsEmpleado) {
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


    public function modificarNombreDelUsuario()
    {
        $nombre = $_POST["nombreDelUsuario"];
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;
            if ($_SESSION["rol"] == "admin") {
                $data["usuarioAdmin"] = true;
            }
            $this->ModificarUsuarioModel->modificarNombreDelUsuario($nombre);

            header("Location: /modificarUsuario?nombreDelUsuarioModificado=true");
            exit();
        }
    }

    public function modificarApellidoUsuario()
    {
        $apellido = $_POST["apellidoUsuario"];
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;
            if ($_SESSION["rol"] == "admin") {
                $data["usuarioAdmin"] = true;
            }
            $this->ModificarUsuarioModel->modificarApellidoUsuario($apellido);

            header("Location: /modificarUsuario?apellidoUsuarioModificado=true");
            exit();
        }
    }

    public function modificarDniUsuario()
    {
        $dniUsuario = $_POST["dniUsuario"];
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        $dniExistente = $this->ModificarUsuarioModel->verificarDniExistente($dniUsuario);
        if ($logeado) {
            $data["login"] = true;
            if ($_SESSION["rol"] == "admin") {
                $data["usuarioAdmin"] = true;
            }
            if (!$dniExistente) {

                $this->ModificarUsuarioModel->modificarDniUsuario($dniUsuario);

            } else {
                header("Location: /modificarUsuario?dniExistente=true");
                exit();
            }
            header("Location: /modificarUsuario?dniUsuarioModificado=true");
            exit();
        }
    }

    public function modificarNacimientoUsuario()
    {
        $nacimiento = $_POST["nacimientoUsuario"];
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;
            if ($_SESSION["rol"] == "admin") {
                $data["usuarioAdmin"] = true;
            }
            $this->ModificarUsuarioModel->modificarNacimientoUsuario($nacimiento);

            header("Location: /modificarUsuario?nacimientoUsuarioModificado=true");

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


}