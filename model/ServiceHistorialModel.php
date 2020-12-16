<?php


class ServiceHistorialModel
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function obtenerListaDeMantenimientoPorPatenteDelVehiculo($patente){
        $tablaMantenimientos=array();
        $sql="SELECT * 
              FROM mantenimiento m JOIN empleado e 
                                    ON e.id = m.id_mecanico
                                    JOIN usuario u
                                    ON e.dni_usuario = u.dni
              WHERE m.patente_vehiculo='".$patente."'";

        $resultQuery = $this->bd->query($sql);

        while ($fila = $resultQuery->fetch_assoc()) {
            $tablaMantenimientos[] = $fila;
        }
        return $tablaMantenimientos;
    }
}