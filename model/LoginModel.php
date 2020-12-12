<?php


class LoginModel
{

    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function logearUsuario($nombre, $contrasenia)
    {
        $contraseniaEncriptada = md5($contrasenia);
        $table = $this->bd->devolverDatos("usuario");
        for ($i = 0; $i < sizeof($table); $i++) {
            $usuarioEmpleado = $this->verificarSiUsuarioEsEmpleado($table[$i]["dni"]);
            if ($table[$i]["nombreUsuario"] == $nombre && $table[$i]["contrasenia"] == $contraseniaEncriptada
                && $usuarioEmpleado) {
                if ($table[$i]["eliminado"] == false) {
                    $_SESSION["nombreUsuario"] = $nombre;
                    $_SESSION["logeado"] = 1;
                    $_SESSION["contrasenia"] = $contrasenia;
                    $_SESSION["rol"] = $this->obtenerRolUsuario($nombre);
                    $_SESSION["dniUsuario"] = $table[$i]["dni"];
                    $_SESSION["nombre"] = $table[$i]["nombre"];
                    $_SESSION["apellido"] = $table[$i]["apellido"];
                    $_SESSION["fecha_nacimiento"] = $table[$i]["fecha_nacimiento"];
                    $_SESSION["licenciaEmpleado"] = $this->obtenerLicenciaEmpleado($nombre);
                    $_SESSION["idEmpleado"] = $this->obtenerIdEmpleado($nombre);
                    return true;
                }
            }
        }
        return false;
    }

    public function obtenerRolUsuario($nombreUsuario)
    {
        $sql = "SELECT tipo_empleado FROM empleado JOIN usuario ON usuario.dni = empleado.dni_usuario WHERE usuario.nombreUsuario = '" . $nombreUsuario . "'";
        $resultado = $this->bd->query($sql);
        $arrayRol = $resultado->fetch_assoc();
        $rol = isset($arrayRol["tipo_empleado"]) ? $arrayRol["tipo_empleado"] : null;

        switch ($rol) {
            case 1:
                $rolString = "admin";
                break;
            case 2:
                $rolString = "supervisor";
                break;
            case 3:
                $rolString = "encargado";
                break;
            case 4:
                $rolString = "chofer";
                break;
            case 5:
                $rolString = "mecanico";
                break;
            default:
                $rolString = null;
                break;
        }
        return $rolString;
    }

    public function verificarSiUsuarioEsEmpleado($dni)
    {
        $resultado = false;
        $table = $this->bd->devolverDatos("empleado");
        for ($i = 0; $i < sizeof($table); $i++) {
            if ($table[$i]["dni_usuario"] == $dni) {
                $resultado = true;
            }
        }
        return $resultado;
    }

    public function obtenerLicenciaEmpleado($nombreUsuario)

    {
        $sql = "SELECT tipo_de_licencia FROM empleado JOIN usuario ON usuario.dni = empleado.dni_usuario WHERE usuario.nombreUsuario = '" . $nombreUsuario . "'";
        $resultado = $this->bd->query($sql);
        $arrayRol = $resultado->fetch_assoc();
        $result = isset($arrayRol["tipo_de_licencia"]) ? $arrayRol["tipo_de_licencia"] : null;

        return $result;

    }

    public function obtenerIdEmpleado($nombreUsuario)

    {
        $sql = "SELECT id FROM empleado JOIN usuario ON usuario.dni = empleado.dni_usuario WHERE usuario.nombreUsuario = '" . $nombreUsuario . "'";
        $resultado = $this->bd->query($sql);
        $arrayRol = $resultado->fetch_assoc();
        $result = isset($arrayRol["id"]) ? $arrayRol["id"] : null;

        return $result;

    }
}
