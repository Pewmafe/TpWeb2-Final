<?php


class ServiceModel
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function obtenerListaCamionesLibres(){
        $tablaCamiones=array();
        $sql = 'SELECT patente, nro_chasis, nro_motor, kilometraje, fabricacion, marca, modelo, calendario_service
            FROM vehiculo v JOIN estado_equipo ee 
                            ON v.estado = ee.id
            WHERE ee.descripcion = "libre"';
        $resultQuery = $this->bd->query($sql);

        while ($fila = $resultQuery->fetch_assoc()) {
            $tablaCamiones[] = $fila;
        }
        return $tablaCamiones;
    }

    public function obtenerListaCamionesEnService(){
        $tablaCamiones=array();
        $sql = 'SELECT patente, nro_chasis, nro_motor, kilometraje, fabricacion, marca, modelo, calendario_service
            FROM vehiculo v JOIN estado_equipo ee 
                            ON v.estado = ee.id
            WHERE ee.descripcion = "mantenimiento"';
        $resultQuery = $this->bd->query($sql);

        while ($fila = $resultQuery->fetch_assoc()) {
            $tablaCamiones[] = $fila;
        }
        return $tablaCamiones;
    }


}