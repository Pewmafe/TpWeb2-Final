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
            if ($table[$i]["nombreUsuario"] == $nombre && $table[$i]["contrasenia"] == $contraseniaEncriptada) {
                $_SESSION["nombreUsuario"] = $nombre;
                $_SESSION["logeado"] = 1;
                $_SESSION["contrasenia"] = $contrasenia;
                $_SESSION["rol"] = $this->obtenerRolUsuario($nombre);
                return true;
            }
        }
        return false;
    }

    public function obtenerRolUsuario($nombreUsuario)
    {
        $sql = "SELECT tipo FROM empleado JOIN usuario ON usuario.id = empleado.id_usuario WHERE usuario.nombreUsuario = '" . $nombreUsuario . "'";
        $resultado = $this->bd->query($sql);
        $arrayRol = $resultado->fetch_assoc();
        $rol = isset($arrayRol["tipo"]) ? $arrayRol["tipo"] : null;

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

}
