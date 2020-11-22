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

    public function modificarNombreDelUsuario($nombre)
    {
        $dni = $_SESSION["dniUsuario"];
        $sql = "UPDATE `grupo12`.`usuario` SET `nombre` = '" . $nombre . "' WHERE (`dni` = '" . $dni . "')";
        $this->bd->query($sql);
        $_SESSION["nombre"] = $nombre;

    }

    public function modificarApellidoUsuario($apellido)
    {
        $dni = $_SESSION["dniUsuario"];
        $sql = "UPDATE `grupo12`.`usuario` SET `apellido` = '" . $apellido . "' WHERE (`dni` = '" . $dni . "')";
        $this->bd->query($sql);
        $_SESSION["apellido"] = $apellido;

    }

    public function modificarDniUsuario($dniUsuario)
    {
        $dni = $_SESSION["dniUsuario"];
        $sql = "UPDATE `grupo12`.`usuario` SET `dni` = '" . $dniUsuario . "' WHERE (`dni` = '" . $dni . "')";
        $this->bd->query($sql);
        $_SESSION["dniUsuario"] = $dniUsuario;

    }

    public function modificarNacimientoUsuario($nacimiento)
    {
        $dni = $_SESSION["dniUsuario"];
        $sql = "UPDATE `grupo12`.`usuario` SET `fecha_nacimiento` = '" . $nacimiento . "' WHERE (`dni` = '" . $dni . "')";
        $this->bd->query($sql);
        $_SESSION["fecha_nacimiento"] = $nacimiento;

    }

    public function modificarLicenciaEmpleado($licencia)
    {
        $id = $_SESSION["idEmpleado"];
        $sql = "UPDATE `grupo12`.`empleado` SET `tipo_de_licencia` = '" . $licencia . "' WHERE (`id` = '" . $id . "')";
        $this->bd->query($sql);
        $_SESSION["licenciaEmpleado"] = $licencia;

    }


    public function verificarSiUnUsuarioEsUnEmpleado($nombreUsuario)
    {

        $sql = "SELECT nombreUsuario from usuario where nombreUsuario = '" . $nombreUsuario . "' and dni in(SELECT dni_usuario FROM empleado)";

        $resultado = $this->bd->query($sql)->fetch_assoc();

        return $resultado;

    }
}