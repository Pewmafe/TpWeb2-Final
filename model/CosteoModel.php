<?php

class CosteoModel
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    function calcularKilometrosConCoordenadas($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo)
    {
        $rad = M_PI / 180;
        $theta = $longitudeFrom - $longitudeTo;
        $dist = sin($latitudeFrom * $rad)
            * sin($latitudeTo * $rad) +  cos($latitudeFrom * $rad)
            * cos($latitudeTo * $rad) * cos($theta * $rad);
        return acos($dist) / $rad * 60 *  1.853;
    }

    public function calcularCosteolocalidades($localidadDestino, $localidadPartida)
    {
        $dniUsuario = $this->obtenerIdUsuario($nombreUsuario);

        $sql = "insert into empleado(tipo_de_licencia, tipo_empleado, dni_usuario)
                values('" . $tipoLicencia . "', " . $rolAsignar . ", " . $dniUsuario . ")";

        $this->bd->query($sql);
    }

}