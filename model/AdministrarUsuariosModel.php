<?php


class AdministrarUsuariosModel
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function obtenerUsuariosEmpleados(){
        $sql = "SELECT usuario.nombreUsuario, empleado.dni, empleado.nombre, empleado.apellido, empleado.tipo_de_licencia, tipo_empleado.descripcion 
                FROM usuario JOIN empleado 
                                ON empleado.id_usuario = usuario.id 
                            JOIN tipo_empleado 
                                ON tipo_empleado.id_tipo_empleado = empleado.tipo 
                GROUP BY usuario.nombreUsuario, empleado.dni, empleado.nombre, empleado.apellido, empleado.tipo_de_licencia, tipo_empleado.descripcion";
       $resultadoQuery = $this->bd->query($sql);

       while($fila = $resultadoQuery->fetch_assoc()){
            $tablaUsuariosEmpleados[] = $fila;
       }

       return $tablaUsuariosEmpleados;
    }

    public function obtenerUsuariosNoEmpleados(){
        $sql = "SELECT usuario.nombreUsuario, usuario.id
                FROM usuario 
                WHERE usuario.id not in(SELECT empleado.id_usuario 
                                        FROM empleado)";
        $resultadoQuery = $this->bd->query($sql);

        while($fila = $resultadoQuery->fetch_assoc()){
            $tablaUsuarios[] = $fila;
        }

        return $tablaUsuarios;
    }

    public function eliminarEmpleado($dniEmpleadoAEliminar){

        $sql = "DELETE FROM empleado WHERE empleado.dni = " . $dniEmpleadoAEliminar;
        $this->bd->query($sql);
    }

    public function eliminarUsuario($idUsuarioAEliminar){
        $queryNoFijarseForeignKey = "SET FOREIGN_KEY_CHECKS=0";
        $this->bd->query($queryNoFijarseForeignKey);

        //sacar id maximo del momento
        $queryIdMaximo = "SELECT MAX(id) as max_id FROM usuario";
        $resultadoQuery = $this->bd->query($queryIdMaximo);
        $idMaximo =  $resultadoQuery->fetch_assoc();

        //el ultimo id cambiarlo a 1+
        $idMaximoASetear = $idMaximo["max_id"] + 1;
        $queryCambiarIdDelUltimoUsuario = "UPDATE usuario SET usuario.id = ".$idMaximoASetear."  
                                           WHERE usuario.id=".$idMaximo["max_id"];
        $this->bd->query($queryCambiarIdDelUltimoUsuario);

        //el que se va a borrar cambiarle el id al ultimo lugar
        $queryCambiarElIdDelUsuarioAEliminar = "UPDATE usuario SET usuario.id = ".$idMaximo["max_id"]."  
                                                WHERE usuario.id=".$idUsuarioAEliminar;
        $this->bd->query($queryCambiarElIdDelUsuarioAEliminar);

        //Al que le cambiamos el id +1 cambiarlo a que tenga el id que previamente tenia el usuario a eliminar
        $queryCambiarElIdDelUsuarioMasUno = "UPDATE usuario SET usuario.id = ".$idUsuarioAEliminar."  
                                             WHERE usuario.id=".$idMaximoASetear;
        $this->bd->query($queryCambiarElIdDelUsuarioMasUno);

        //Eliminar el que esta ultimo que seria el usuario que se pidio para dar de baja
        $sql = "DELETE FROM usuario WHERE usuario.id =" . $idMaximo["max_id"];
        $this->bd->query($sql);

        //volver a resetear el AUTOINCREMENTAL en la tabla usuario
        $querySaberElIdMaximo = "SELECT MAX(usuario.id) as max_id FROM usuario";
        $resultadoQuery = $this->bd->query($querySaberElIdMaximo);
        $idMaximo = $resultadoQuery->fetch_assoc();

        $queryResetearAutoIncremental = "ALTER TABLE usuario AUTO_INCREMENT = ".$idMaximo["max_id"] ;
        $this->bd->query($queryResetearAutoIncremental);

        $queryFijarseForeignKey = "SET FOREIGN_KEY_CHECKS=1";
        $this->bd->query($queryNoFijarseForeignKey);
    }


}