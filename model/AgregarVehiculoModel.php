<?php


class AgregarVehiculoModel
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function agregarVehiculo($patente, $nro_chasis, $nro_motor, $kilometraje, $fabricacion,
                                    $marca, $modelo, $calendario_service)
    {

        $sql = "INSERT INTO grupo12.vehiculo(patente, nro_chasis, nro_motor, kilometraje, fabricacion, 
                                                        marca, modelo, calendario_service)
                VALUES ('" . $patente . "'," . $nro_chasis . "," . $nro_motor . "," . $kilometraje . ",'" . $fabricacion . "',
                         '" . $marca . "','" . $modelo . "','" . $calendario_service . "')";
        return $this->bd->query($sql);

    }

    public function verificarPatenteExistente($patente)
    {
        $resultado = false;

        $table = $this->bd->devolverDatos("vehiculo");
        for ($i = 0; $i < sizeof($table); $i++) {
            if ($table[$i]["patente"] == $patente) {
                $resultado = true;
            }
        }
        return $resultado;
    }
}