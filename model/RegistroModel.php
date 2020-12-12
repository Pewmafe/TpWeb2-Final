<?php

class RegistroModel
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function registrarUsuario($nombreUsuario, $contrasenia, $dni, $nombre, $apellido, $fechaNacimiento)
    {
        $contraseniaEncriptada = md5($contrasenia);
        $sql = "INSERT INTO grupo12.usuario(dni, nombreUsuario, contrasenia, nombre, apellido, fecha_nacimiento,eliminado)
            VALUES (" . $dni . ",'" . $nombreUsuario . "','" . $contraseniaEncriptada . "','" . $nombre . "','" . $apellido . "','" . $fechaNacimiento . "', false)";
        return $this->bd->query($sql);
    }

    public function registrarEmpleado($tipoLicencia, $rolAsignar, $nombreUsuario)
    {
        $dniUsuario = $this->obtenerIdUsuario($nombreUsuario);

        $sql = "insert into empleado(tipo_de_licencia, tipo_empleado, dni_usuario)
                values('" . $tipoLicencia . "', " . $rolAsignar . ", " . $dniUsuario . ")";

        $this->bd->query($sql);
    }

    public function verificarNombreUsuarioExistente($NombreUsuario)
    {
        $resultado = false;

        $table = $this->bd->devolverDatos("usuario");
        for ($i = 0; $i < sizeof($table); $i++) {
            if ($table[$i]["nombreUsuario"] == $NombreUsuario) {
                $resultado = true;
            }
        }
        return $resultado;
    }

    public function verificarDNIUsuarioExistente($dni)
    {
        $resultado = false;

        $table = $this->bd->devolverDatos("usuario");
        for ($i = 0; $i < sizeof($table); $i++) {
            if ($table[$i]["dni"] == $dni) {
                $resultado = true;
            }
        }
        return $resultado;
    }

    public function obtenerIdUsuario($nombreUsuario)
    {
        $sql = "SELECT dni FROM usuario WHERE usuario.nombreUsuario = '" . $nombreUsuario . "'";
        $resultado = $this->bd->query($sql);
        $arrayRol = $resultado->fetch_assoc();
        $dniUsuario = $arrayRol["dni"];

        return $dniUsuario;
    }
}