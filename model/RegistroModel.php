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
        $sql = "INSERT INTO grupo12.usuario(nombreUsuario, contrasenia)
            VALUES ('" . $nombre . "','" . $contraseniaEncriptada . "')";
        return $this->bd->query($sql);
    }

    public function  registrarEmpleado($dni, $nombre, $apellido, $fechaNacimiento, $tipoLicencia, $rolAsignar, $nombreUsuario){
        $idUsuario = $this->obtenerIdUsuario($nombreUsuario);

        $sql = "insert into empleado(dni, nombre, apellido, nacimiento, tipo_de_licencia, tipo, id_usuario)
                values(".$dni.",'".$nombre."','".$apellido."', ".$fechaNacimiento.", '".$tipoLicencia."', ".$rolAsignar.", ".$idUsuario.")";
        $this->bd->query($sql);
    }

    public function verificarNombreUsuarioExistente($NombreUsuario){
        $resultado = false;

        $table = $this->bd->devolverDatos("usuario");
        for ($i = 0; $i < sizeof($table); $i++) {
            if ($table[$i]["nombreUsuario"] == $NombreUsuario) {
                $resultado = true;
            }
        }
        return $resultado;
    }

    public function obtenerIdUsuario($nombreUsuario){
        $sql = "SELECT id FROM usuario WHERE usuario.nombreUsuario = '".$nombreUsuario."'";
        $resultado = $this->bd->query($sql);
        $arrayRol = $resultado-> fetch_assoc();
        $idUsuario = $arrayRol["id"];

        return $idUsuario;
    }
}