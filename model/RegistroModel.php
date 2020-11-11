<?php

class RegistroModel
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function registrarUsuario($nombre, $contrasenia)
    {
        $contraseniaEncriptada = md5($contrasenia);
        $sql = "INSERT INTO grupo12.usuario(usuario, contrasenia)
            VALUES ('" . $nombre . "','" . $contraseniaEncriptada . "')";

        return $this->bd->query($sql);

    }
}