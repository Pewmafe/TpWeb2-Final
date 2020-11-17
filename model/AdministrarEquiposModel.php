<?php


class AdministrarEquiposModel
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function obtenerCamiones()
    {
    $sql = 'SELECT patente, nro_chasis, nro_motor, kilometraje, fabricacion, marca, modelo, calendario_service
            FROM vehiculo';
    $resultQuery = $this->bd->query($sql);

        while($fila = $resultQuery->fetch_assoc()){
            $tablaCamiones[] = $fila;
        }
        return $tablaCamiones;
    }

    public function obtenerAcoplados()
    {
    $sql = 'SELECT acoplado.patente, acoplado.chasis, tipo_acoplado.descripcion
            FROM acoplado join tipo_acoplado on acoplado.tipo = tipo_acoplado.id';
    $resultQuery = $this->bd->query($sql);

        while($fila = $resultQuery->fetch_assoc()){
            $tablaAcoplados[] = $fila;
        }
        return $tablaAcoplados;
    }
}