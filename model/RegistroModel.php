<?php

class RegistroModel
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    /*public function registrarUsuario($nombre, $apellido, $email, $contrasenia, $fechaNacimiento, $NombreUsuario, $Dni, $licencia)
    {
        $contraseniaEncriptada = md5($contrasenia);

        $sql = "INSERT INTO Usuario(nombre, apellido, email, contrasenia, fechaNacimiento, NombreUsuario, Dni, licencia)
            VALUES ('" . $nombre . "','" . $apellido . "','" . $email . "','" . $contraseniaEncriptada . "','" . $fechaNacimiento . "','" . $NombreUsuario . "'," . $Dni . ",'" . $licencia . "')";

        return $this->bd->query($sql);
    }*/
    public function registrarUsuario($nombre, $contrasenia)
    {
        $contraseniaEncriptada = md5($contrasenia);
        $sql = "INSERT INTO grupo12.usuario(usuario, contrasenia)
            VALUES ('" . $nombre . "','" . $contraseniaEncriptada . "')";

        return $this->bd->query($sql);

    }
}