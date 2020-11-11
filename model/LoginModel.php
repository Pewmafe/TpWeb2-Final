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
            if ($table[$i]["usuario"] == $nombre && $table[$i]["contrasenia"] == $contraseniaEncriptada) {
                $_SESSION["usuario"] = $nombre;
                $_SESSION["logeado"] = 1;
                return true;
            }
        }
        return false;
    }
}
