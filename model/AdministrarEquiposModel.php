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

    public function eliminarVehiculo($patenteVehAEliminar){

        $sql = "DELETE FROM vehiculo WHERE vehiculo.patente = " . $patenteVehAEliminar;
        $this->bd->query($sql);
    }

    public function eliminarAcoplado($patenteAcopAEliminar){

        $sql = "DELETE FROM acoplado WHERE acoplado.patente = " . $patenteAcopAEliminar;
        $this->bd->query($sql);
    }

    public function modificarCamion($patente,
                                     $nroChasis,
                                     $nroMotor,
                                     $kilometraje,
                                     $fabricacion,
                                     $marca,
                                     $modelo,
                                     $calendarioService,
                                     $patenteCamionQueSeVaAModificar){
        $sql = "UPDATE vehiculo SET patente=".$patente.",nroChasis='".$nroChasis."',nroMotor='".$nroMotor."',kilometraje='".$kilometraje."',fabricacion='".$fabricacion."'
        ,marca='".$marca."',modelo='".$modelo."',calendarioService='".$calendarioService."' 
        WHERE patente=".$patenteCamionQueSeVaAModificar;
        $this->bd->query($sql);
    }

    public function modificarAcoplado($patente,
                                      $chasis,
                                      $tipoAcoplado,
                                      $patenteAcopladoQueSeVaAModificar){
        $sql = "UPDATE vehiculo SET patente=".$patente.",chasis='".$chasis."',tipo='".$tipoAcoplado."'
        WHERE patente=".$patenteAcopladoQueSeVaAModificar;
        $this->bd->query($sql);
    }

    public function verificarPatenteCamionExistente($patenteAModificar, $patente){
        $resultado = false;

        $sql = "SELECT patente FROM vehiculo 
                WHERE patente <>" . $patente;

        $resultadoQuery = $this->bd->query($sql);

        while($fila = $resultadoQuery->fetch_assoc()){
            $tablaCamiones[] = $fila;
        }
        for ($i = 0; $i < sizeof($tablaCamiones); $i++) {
            if ($tablaCamiones[$i]["patente"] == $patenteAModificar) {
                $resultado = true;
            }
        }
        return $resultado;
    }

    public function verificarPatenteAcopladoExistente($patenteAModificar, $patente){
        $resultado = false;

        $sql = "SELECT patente FROM acoplado 
                WHERE patente <>" . $patente;

        $resultadoQuery = $this->bd->query($sql);

        while($fila = $resultadoQuery->fetch_assoc()){
            $tablaAcoplados[] = $fila;
        }
        for ($i = 0; $i < sizeof($tablaAcoplados); $i++) {
            if ($tablaAcoplados[$i]["patente"] == $patenteAModificar) {
                $resultado = true;
            }
        }
        return $resultado;
    }
}