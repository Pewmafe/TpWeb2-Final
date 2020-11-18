<?php


class ModificarUsuarioModel
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
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


    public function modificarNombreUsuario($nombreNuevo)
    {
        $nombreViejo = $_SESSION["nombreUsuario"];
        $sql = "UPDATE `grupo12`.`usuario` SET `nombreUsuario` = '" . $nombreNuevo . "' WHERE (`nombreUsuario` = '" . $nombreViejo . "')";
        $this->bd->query($sql);
        $_SESSION["nombreUsuario"] = $nombreNuevo;
    }

    public function modificarContraseniaUsuario($contrasenia)
    {
        $nombreViejo = $_SESSION["nombreUsuario"];
        $contraseniaEncriptada = md5($contrasenia);

        $sql = "UPDATE `grupo12`.`usuario` SET `contrasenia` = '" . $contraseniaEncriptada . "' WHERE (`nombreUsuario` = '" . $nombreViejo . "')";
        $this->bd->query($sql);
        $_SESSION["contrasenia"] = $contrasenia;
    }

    public function modificarNombreEmpleado($nombre)
    {
        $dni = $_SESSION["dni"];
        $sql = "UPDATE `grupo12`.`empleado` SET `nombre` = '" . $nombre . "' WHERE (`dni` = '" . $dni . "')";
        $this->bd->query($sql);
        $_SESSION["nombreEmpleado"] = $nombre;

    }

    public function modificarApellidoEmpleado($apellido)
    {
        $dni = $_SESSION["dni"];
        $sql = "UPDATE `grupo12`.`empleado` SET `apellido` = '" . $apellido . "' WHERE (`dni` = '" . $dni . "')";
        $this->bd->query($sql);
        $_SESSION["apellidoEmpleado"] = $apellido;

    }
}