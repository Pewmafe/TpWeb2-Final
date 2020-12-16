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

    public function obtenerListaEmpleadosMecanicos(){
        $sql = "SELECT *
                FROM empleado e JOIN tipo_empleado te
                                ON te.id_tipo_empleado = e.tipo_empleado
                                JOIN usuario u
                                ON u.dni = e.dni_usuario
                WHERE te.descripcion = 'mecanico'";
        $resultadoQuery = $this->bd->query($sql);

        $lista = '<option selected disabled>-</option>';
        while ($fila = $resultadoQuery->fetch_assoc()) {
            $lista .= "<option value='$fila[id]'>$fila[apellido] $fila[nombre] $fila[dni]</option>";
        }
        return $lista;
    }

    public function obtenerDatosEmpleadoMecanicoPorId($id){
        $sql = "SELECT u.nombre, u.apellido, u.dni
                FROM usuario u JOIN empleado e
                                ON e.dni_usuario = u.dni
                WHERE e.id =".$id;

        $resultadoQuery = $this->bd->query($sql);

        while ($fila = $resultadoQuery->fetch_assoc()) {
            $datosEmpleado = $fila;
        }
        return $datosEmpleado;

    }

    public function obtenerKmVehiculoPorPatente($patenteVehiculo){
        $sql = "SELECT v.kilometraje
                FROM vehiculo v
                WHERE v.patente='".$patenteVehiculo."'";

        $resultadoQuery = $this->bd->query($sql);

        $kilometraje = $resultadoQuery->fetch_assoc();
        return $kilometraje["kilometraje"];
    }

    public function registrarUnMantenimiento($idMecanico, $patenteVehiculo, $kmVehiculo){
        $sql = "INSERT INTO mantenimiento(km_unidad, patente_vehiculo, id_mecanico)
                VALUES(".$kmVehiculo.",'".$patenteVehiculo."',".$idMecanico.")";

        $this->bd->query($sql);
    }

    public function setearEstadoVehiculoEnMantenimientoPorPatente($patenteVehiculo){
        $sql = "UPDATE vehiculo SET estado = 3 WHERE vehiculo.patente = '".$patenteVehiculo."'";

        $this->bd->query($sql);
    }




}