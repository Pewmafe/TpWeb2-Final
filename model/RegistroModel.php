<?php

class RegistroModel
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function registrarUsuario($nombre, $contrasenia, $rolUsuario)
    {
        $contraseniaEncriptada = md5($contrasenia);
        $sql = "INSERT INTO grupo12.usuario(usuario, contrasenia, rol)
            VALUES ('" . $nombre . "','" . $contraseniaEncriptada . "'," . $rolUsuario . ")";
        return $this->bd->query($sql);
    }

    public function verificarNombreUsuarioExistente($NombreUsuario){
        $resultado = false;

        $table = $this->bd->devolverDatos("usuario");
        for ($i = 0; $i < sizeof($table); $i++) {
            if ($table[$i]["usuario"] == $NombreUsuario) {
                $resultado = true;
            }
        }

        return $resultado;
    }
}