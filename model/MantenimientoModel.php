<?php


class MantenimientoModel
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
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

    public function obtenerListaCamionesEnServicePorMecanicoId($idMecanico){
        $tablaCamiones=array();
        $sql = 'SELECT patente, nro_chasis, nro_motor, kilometraje, fabricacion, marca, modelo, calendario_service
            FROM vehiculo v JOIN estado_equipo ee 
                            ON v.estado = ee.id
                            JOIN mantenimiento m 
                            ON m.patente_vehiculo = v.patente
            WHERE ee.descripcion = "mantenimiento"
            AND m.id_mecanico=' . $idMecanico;
        $resultQuery = $this->bd->query($sql);

        while ($fila = $resultQuery->fetch_assoc()) {
            $tablaCamiones[] = $fila;
        }
        return $tablaCamiones;
    }

    public function setearEstadoVehiculoEnLibrePorPatente($patenteVehiculo){
        $sql = "UPDATE vehiculo SET estado = 1 WHERE vehiculo.patente = '".$patenteVehiculo."'";

        $this->bd->query($sql);
    }

    public function obtenerElIdDeUnMantenimientoPorMecanicoYVehiculo($idEmpleado, $patenteVehiculo){
        $sql = "SELECT m.id 
                FROM mantenimiento m
                WHERE m.id_mecanico=".$idEmpleado."
                AND m.patente_vehiculo ='".$patenteVehiculo."'";

        $resultado =$this->bd->query($sql);
        $idMantenimiento = $resultado->fetch_assoc();
        return $idMantenimiento["id"];
    }


    public function setearFechaDelServiceEnMantenimiento($fechaFinalizacion , $idMantenimiento){
        $sql = "UPDATE mantenimiento SET fecha_service = '".$fechaFinalizacion."' WHERE mantenimiento.id = ".$idMantenimiento;

        $this->bd->query($sql);
    }

    public function setearFechaDelUltimoServiceEnVehiculoPorPatente($patenteVehiculo,$fechaFinalizacion){
        $sql = "UPDATE vehiculo SET calendario_service = '".$fechaFinalizacion."' WHERE vehiculo.patente = '".$patenteVehiculo."'";

        $this->bd->query($sql);
    }

}