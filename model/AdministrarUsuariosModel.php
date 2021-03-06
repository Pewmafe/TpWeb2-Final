<?php


class AdministrarUsuariosModel
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function obtenerUsuariosEmpleados()
    {
        $sql = "SELECT usuario.nombreUsuario, usuario.dni, usuario.nombre, usuario.apellido, usuario.fecha_nacimiento,empleado.id,empleado.tipo_de_licencia, tipo_empleado.descripcion 
                FROM usuario JOIN empleado 
                                ON empleado.dni_usuario = usuario.dni
                            JOIN tipo_empleado 
                                ON tipo_empleado.id_tipo_empleado = empleado.tipo_empleado 
                GROUP BY usuario.nombreUsuario, usuario.dni, usuario.nombre, usuario.apellido, empleado.id,empleado.tipo_de_licencia, tipo_empleado.descripcion";
        $resultadoQuery = $this->bd->query($sql);

        while ($fila = $resultadoQuery->fetch_assoc()) {
            $tablaUsuariosEmpleados[] = $fila;
        }

        return $tablaUsuariosEmpleados;
    }

    public function obtenerUsuariosNoEmpleados()
    {
        $sql = "SELECT usuario.nombreUsuario, usuario.dni,usuario.nombre, usuario.apellido,usuario.fecha_nacimiento
                FROM usuario 
                WHERE usuario.dni not in(SELECT empleado.dni_usuario 
                                        FROM empleado)
                and usuario.eliminado = 0";
        $resultadoQuery = $this->bd->query($sql);

        while ($fila = $resultadoQuery->fetch_assoc()) {
            $tablaUsuarios[] = $fila;
        }
        return $tablaUsuarios;
    }

    public function eliminarEmpleado($idEmpleadoAEliminar)
    {
        $queryNoFijarseForeignKey = "SET FOREIGN_KEY_CHECKS=0";
        $this->bd->query($queryNoFijarseForeignKey);

        //sacar id maximo del momento
        $queryIdMaximo = "SELECT MAX(id) as max_id FROM empleado";
        $resultadoQuery = $this->bd->query($queryIdMaximo);
        $idMaximo = $resultadoQuery->fetch_assoc();

        //el ultimo id cambiarlo a 1+
        $idMaximoASetear = $idMaximo["max_id"] + 1;
        $queryCambiarIdDelUltimoEmpleado = "UPDATE empleado SET empleado.id = " . $idMaximoASetear . "  
                                           WHERE empleado.id=" . $idMaximo["max_id"];
        $this->bd->query($queryCambiarIdDelUltimoEmpleado);

        //el que se va a borrar cambiarle el id al ultimo lugar
        $queryCambiarElIdDelEmpleadoAEliminar = "UPDATE empleado SET empleado.id = " . $idMaximo["max_id"] . "  
                                                WHERE empleado.id=" . $idEmpleadoAEliminar;
        $this->bd->query($queryCambiarElIdDelEmpleadoAEliminar);

        //Al que le cambiamos el id +1 cambiarlo a que tenga el id que previamente tenia el empleado a eliminar
        $queryCambiarElIdDelEmpleadoMasUno = "UPDATE empleado SET empleado.id = " . $idEmpleadoAEliminar . "  
                                             WHERE empleado.id=" . $idMaximoASetear;
        $this->bd->query($queryCambiarElIdDelEmpleadoMasUno);

        //Eliminar el que esta ultimo que seria el empleado que se pidio para dar de baja
        $sql = "DELETE FROM empleado WHERE empleado.id =" . $idMaximo["max_id"];
        $this->bd->query($sql);

        //volver a resetear el AUTOINCREMENTAL en la tabla empleado
        $querySaberElIdMaximo = "SELECT MAX(empleado.id) as max_id FROM empleado";
        $resultadoQuery = $this->bd->query($querySaberElIdMaximo);
        $idMaximo = $resultadoQuery->fetch_assoc();

        $queryResetearAutoIncremental = "ALTER TABLE empleado AUTO_INCREMENT = " . $idMaximo["max_id"];
        $this->bd->query($queryResetearAutoIncremental);

        $queryFijarseForeignKey = "SET FOREIGN_KEY_CHECKS=1";
        $this->bd->query($queryNoFijarseForeignKey);

    }

    public function eliminarUsuario($dniUsuarioAEliminar)
    {
        $sql = "UPDATE usuario SET eliminado = 1 WHERE usuario.dni = ". $dniUsuarioAEliminar;
        $this->bd->query($sql);

    }

    public function modificarUsuario($nombreUsuario,
                                     $nombre,
                                     $apellido,
                                     $dni,
                                     $fechaNacimiento,
                                     $dniUsuarioQueSeVaAModificar)
    {
        $sql = "UPDATE usuario SET dni=" . $dni . ",nombreUsuario='" . $nombreUsuario . "',nombre='" . $nombre . "',apellido='" . $apellido . "',fecha_nacimiento='" . $fechaNacimiento . "' 
        WHERE dni=" . $dniUsuarioQueSeVaAModificar;
        $this->bd->query($sql);
    }

    public function modificarEmpleado($nombreUsuario,
                                      $nombre,
                                      $apellido,
                                      $dni,
                                      $fechaNacimiento,
                                      $tipoLicenciaAModificar,
                                      $rolAModificar,
                                      $id,
                                      $dniUsuarioQueSeVaAModificar)
    {
        $sqlUsuario = "UPDATE usuario SET dni=" . $dni . ",nombreUsuario='" . $nombreUsuario . "',nombre='" . $nombre . "',apellido='" . $apellido . "',fecha_nacimiento='" . $fechaNacimiento . "' 
        WHERE dni=" . $dniUsuarioQueSeVaAModificar;
        $resultado = $this->bd->query($sqlUsuario);
        $sqlEmpleado = "UPDATE empleado SET tipo_de_licencia='" . $tipoLicenciaAModificar . "',tipo_empleado=" . $rolAModificar . " WHERE id=" . $id;
        $this->bd->query($sqlEmpleado);
    }

    public function verificarNombreUsuarioExistente($nombreUsuario, $dni)
    {
        $resultado = false;

        $sql = "SELECT nombreUsuario FROM usuario 
                WHERE dni <>" . $dni;
        $resultadoQuery = $this->bd->query($sql);

        while ($fila = $resultadoQuery->fetch_assoc()) {
            $tablaUsuarios[] = $fila;
        }

        for ($i = 0; $i < sizeof($tablaUsuarios); $i++) {
            if ($tablaUsuarios[$i]["nombreUsuario"] == $nombreUsuario) {
                $resultado = true;
            }
        }
        return $resultado;
    }

    public function verificarDNIUsuarioExistente($dniAModificar, $dni)
    {
        $resultado = false;

        $sql = "SELECT dni FROM usuario 
                WHERE dni <>" . $dni;

        $resultadoQuery = $this->bd->query($sql);

        while ($fila = $resultadoQuery->fetch_assoc()) {
            $tablaUsuarios[] = $fila;
        }
        for ($i = 0; $i < sizeof($tablaUsuarios); $i++) {
            if ($tablaUsuarios[$i]["dni"] == $dniAModificar) {
                $resultado = true;
            }
        }
        return $resultado;
    }

    public function  verificarSiUnEmpleadoEsUnChofer($id){
        $resultado = false;

        $sql = "SELECT tp.descripcion 
                 FROM tipo_empleado tp JOIN empleado e
                                        ON e.tipo_empleado = tp.id_tipo_empleado
                 WHERE e.id = ". $id;
        $resultadoQuery = $this->bd->query($sql);

        $empleadoChofer = $resultadoQuery->fetch_assoc();

        if($empleadoChofer["descripcion"] == "chofer"){
            $resultado=true;
        }
        return $resultado;
    }

    public function verificarSiChoferEstaEnViajeActivoOPendiente($id){
        $resultado = false;
        $sql = "SELECT ep.descripcion 
                 FROM empleado e JOIN viaje v
                                    ON v.chofer_id = e.id
                                  JOIN proforma p
                                    ON p.viaje_id = v.id
                                  JOIN estado_proforma ep
                                    ON ep.id = p.estado
                 WHERE e.id = ". $id;

        $resultadoQuery = $this->bd->query($sql);

        while ($fila = $resultadoQuery->fetch_assoc()) {
            $tablaEstadoProforma[] = $fila;
        }

        for ($i = 0; $i < sizeof($tablaEstadoProforma); $i++) {
            if ($tablaEstadoProforma[$i]["descripcion"] == "PENDIENTE" or
                $tablaEstadoProforma[$i]["descripcion"] == "ACTIVO") {
                $resultado = true;
            }
        }
        return $resultado;
    }
}