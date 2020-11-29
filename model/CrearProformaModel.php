<?php


class CrearProformaModel
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function obtenerUsuariosChoferes(){
        $sql = "SELECT usuario.dni, usuario.nombre, usuario.apellido, empleado.id, empleado.tipo_de_licencia 
                FROM usuario JOIN empleado 
                                ON empleado.dni_usuario = usuario.dni
                             JOIN tipo_empleado 
                                ON tipo_empleado.id_tipo_empleado = empleado.tipo_empleado   
                WHERE tipo_empleado.descripcion = 'chofer'
                GROUP BY usuario.dni, usuario.nombre, usuario.apellido, empleado.id, empleado.tipo_de_licencia";
        $resultadoQuery = $this->bd->query($sql);

        while($fila = $resultadoQuery->fetch_assoc()){
            $tablaChoferes[] = $fila;
        }
        return $tablaChoferes;
    }

    public function obtenerEquiposVehiculos(){
        $sql = "SELECT patente, marca, modelo, calendario_service 
                FROM vehiculo";
        $resultadoQuery = $this->bd->query($sql);

        while($fila = $resultadoQuery->fetch_assoc()){
            $tablaEquipos[] = $fila;
        }
        return $tablaEquipos;
    }

    public function obtenerEquiposAcoplados(){
        $sql = "SELECT acoplado.patente, tipo_acoplado.descripcion  
                FROM acoplado JOIN tipo_acoplado 
                                    ON tipo_acoplado.id = acoplado.tipo
                GROUP BY acoplado.patente, tipo_acoplado.descripcion";
        $resultadoQuery = $this->bd->query($sql);

        while($fila = $resultadoQuery->fetch_assoc()){
            $tablaAcoplados[] = $fila;
        }
        return $tablaAcoplados;
    }

    public function obtenerLocalidades(){
        $sql = "SELECT id, descripcion
                FROM localidad";
        $resultadoQuery = $this->bd->query($sql);

        while($fila = $resultadoQuery->fetch_assoc()){
            $tablaLocalidades[] = $fila;
        }
        return $tablaLocalidades;
    }

    public function obtenerTiposDeCarga(){
        $sql = "SELECT id_tipo_carga, descripcion
                FROM tipo_carga";
        $resultadoQuery = $this->bd->query($sql);

        while($fila = $resultadoQuery->fetch_assoc()){
            $tablaTipoDeCarga[] = $fila;
        }
        return $tablaTipoDeCarga;
    }


    public function registrarDireccion($calle, $altura, $localidad){
        $sql="INSERT INTO direccion(calle, altura, localidad) values ('".$calle."',".$altura.",".$localidad.")";
        $idDireccion = $this->bd->queryQueDevuelveId($sql);
        return $idDireccion;
    }

    public function obtenerIdDireccionPorCalleAlturaLocalidad($calle, $altura, $localidad){
        $sql="SELECT id FROM direccion WHERE calle='".$calle."' and altura=".$altura." and localidad=".$localidad;
        $resultadoQuery=$this->bd->query($sql);
        $idDireccion = $resultadoQuery->fetch_assoc();
        return $idDireccion["id"];
    }

    public function registrarClienteConDireccion($idDireccion, $denominacion,
                                                 $nombre, $apellido ,$cuit, $telefono){
        $sql="INSERT INTO cliente(cuit, telefono, direccion, denominacion, nombre, apellido) 
        values (".$cuit.",".$telefono.",".$idDireccion.",'".$denominacion."', '".$nombre."', '".$apellido."')";
        $this->bd->query($sql);

    }

    public function registrarCarga($tipo, $peso){
        $sql="INSERT INTO carga(peso_neto, tipo) 
        values (".$peso.",".$tipo.")";
        $idCarga=$this->bd->queryQueDevuelveId($sql);
        return $idCarga;
    }

    public function registrarViaje($carga, $acoplado_patente, $vehiculo_patente, $choferId, $fecha_incio, $fecha_fin, $destinoId, $partidaId){
        $sql="INSERT INTO viaje(carga_id, acoplado_patente, vehiculo_patente, chofer_id, fecha_incio, fecha_fin, destino_id, partida_id) 
        values (".$carga.",'".$acoplado_patente."','".$vehiculo_patente."',".$choferId.", '".$fecha_incio."', '".$fecha_fin."', ".$destinoId.", ".$partidaId.")";
        $idViaje=$this->bd->queryQueDevuelveId($sql);
        return $idViaje;
    }

    public function registrarProforma($clienteCuit, $viajeId){
        $sql="INSERT INTO proforma(cliente_cuit, viaje_id) 
        values (".$clienteCuit.",".$viajeId.")";
        $this->bd->query($sql);
    }

    public function verificarCuitClienteExistente($cuit){
        $resultado = false;

        $table = $this->bd->devolverDatos("cliente");
        for ($i = 0; $i < sizeof($table); $i++) {
            if ($table[$i]["cuit"] == $cuit) {
                $resultado = true;
            }
        }
        return $resultado;
    }


}
