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
                                                 $nombre, $apellido ,$cuit, $telefono, $email, $contact1, $contact2){
        $contacto1 = isset($contact1) ? $contact1 : "NULL";
        $contacto2 = isset($contact2) ? $contact2 : "NULL";
        $sql="INSERT INTO cliente(cuit, telefono, direccion, denominacion, nombre, apellido, email, contacto1, contacto2) 
        values (".$cuit.",".$telefono.",".$idDireccion.",'".$denominacion."', '".$nombre."', '".$apellido."','".$email."',
        '".$contacto1."', '".$contacto2."')";
        $this->bd->query($sql);

    }

    public function registrarHazard($imoSubClass){
        $sql="INSERT INTO hazard(imo_sub_class_id) 
        values (".$imoSubClass.")";
        $idHazard=$this->bd->queryQueDevuelveId($sql);
        return $idHazard;
    }

    public function registrarReefer($reeferTemperatura){
        $sql="INSERT INTO reefer(temperatura) 
        values (".$reeferTemperatura.")";
        $idReefer=$this->bd->queryQueDevuelveId($sql);
        return $idReefer;
    }

    public function registrarCarga($tipo, $peso, $hazard, $reefer){
        $hazardId = isset($hazard) ? $hazard : "NULL";
        $reeferId = isset($reefer) ? $reefer : "NULL";
        $sql="INSERT INTO carga(peso_neto, tipo, hazard_id, reefer_id) 
        values (".$peso.",".$tipo.",".$hazardId.",".$reeferId.")";
        $idCarga=$this->bd->queryQueDevuelveId($sql);
        return $idCarga;
    }

    public function registrarViaje($carga, $acoplado_patente, $vehiculo_patente, $choferId, $fecha_incio, $fecha_fin, $destinoId, $partidaId){
        $sql="INSERT INTO viaje(carga_id, acoplado_patente, vehiculo_patente, chofer_id, etd, eta, destino_id, partida_id) 
        values (".$carga.",'".$acoplado_patente."','".$vehiculo_patente."',".$choferId.", '".$fecha_incio."', '".$fecha_fin."', ".$destinoId.", ".$partidaId.")";
        $idViaje=$this->bd->queryQueDevuelveId($sql);
        return $idViaje;
    }

    public function registrarProforma($clienteCuit, $viajeId){
        $sql="INSERT INTO proforma(cliente_cuit, viaje_id, estado) 
        values (".$clienteCuit.",".$viajeId.", 2)";
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

    public function obtenerProvincias(){
        $sql= "SELECT * FROM provincia";

        $resultadoQuery = $this->bd->query($sql);
        $lista = '<option selected disabled>-</option>';
        while($fila = $resultadoQuery->fetch_assoc()){
            $lista .= "<option value='$fila[id]'>$fila[descripcion]</option>";
        }
        return $lista;
    }

    public function obtenerLocalidades($idProvincia){
        $sql = "SELECT *
                FROM localidad
                WHERE provincia_id =" . $idProvincia;
        $resultadoQuery = $this->bd->query($sql);

        $lista = '<option selected disabled>-</option>';
        while($fila = $resultadoQuery->fetch_assoc()){
            $lista .= "<option value='$fila[id]'>$fila[descripcion]</option>";
        }
        return $lista;
    }

    public function obtenerImoClases(){
        $sql= "SELECT * FROM imo_class";

        $resultadoQuery = $this->bd->query($sql);
        $lista = '<option selected disabled>-</option>';
        while($fila = $resultadoQuery->fetch_assoc()){
            $lista .= "<option value='$fila[id]'>$fila[descripcion]</option>";
        }
        return $lista;
    }

    public function obtenerImoSubClases($idImoClass){
        $sql = "SELECT *
                FROM imo_sub_class
                WHERE imo_class_id =" . $idImoClass;
        $resultadoQuery = $this->bd->query($sql);

        $lista = '<option selected disabled>-</option>';
        while($fila = $resultadoQuery->fetch_assoc()){
            $lista .= "<option value='$fila[id]'>$fila[descripcion]</option>";
        }
        return $lista;
    }

}
