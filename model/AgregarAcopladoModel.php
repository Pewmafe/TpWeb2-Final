<?php


class AgregarAcopladoModel
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function agregarAcoplado($patente, $chasis, $tipoAcoplado)
    {

        $sql = "INSERT INTO grupo12.acoplado(patente, chasis, tipo, estado)
                VALUES ('" . $patente . "'," . $chasis . ",'" . $tipoAcoplado . "', 1)";
        return $this->bd->query($sql);
    }

    public function verificarPatenteExistente($patente)
    {
        $resultado = false;

        $table = $this->bd->devolverDatos("acoplado");
        for ($i = 0; $i < sizeof($table); $i++) {
            if ($table[$i]["patente"] == $patente) {
                $resultado = true;
            }
        }
        return $resultado;
    }
}