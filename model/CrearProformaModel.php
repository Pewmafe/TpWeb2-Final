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
}
