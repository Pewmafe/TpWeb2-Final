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

    public function modificarNombre($nombreNuevo)
    {
        $nombreViejo = $_SESSION["nombreUsuario"];
        $sql = "UPDATE `grupo12`.`usuario` SET `nombreUsuario` = '" . $nombreNuevo . "' WHERE (`nombreUsuario` = '" . $nombreViejo . "')";
        $this->bd->query($sql);
        $_SESSION["nombreUsuario"] = $nombreNuevo;
    }

    public function modificarContrasenia($contrasenia)
    {
        $nombreViejo = $_SESSION["nombreUsuario"];
        $contraseniaEncriptada = md5($contrasenia);

        $sql = "UPDATE `grupo12`.`usuario` SET `contrasenia` = '" . $contraseniaEncriptada . "' WHERE (`nombreUsuario` = '" . $nombreViejo . "')";
        $this->bd->query($sql);
        $_SESSION["contrasenia"] = $contrasenia;
    }
}