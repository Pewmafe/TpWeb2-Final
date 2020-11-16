<?php


class AdministrarUsuarioModel
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
        $sql = "SELECT usuario.nombreUsuario 
                FROM usuario 
                WHERE usuario.id not in(SELECT empleado.id_usuario 
                                        FROM empleado)";
        $resultadoQuery = $this->bd->query($sql);

        while($fila = $resultadoQuery->fetch_assoc()){
            $tablaUsuarios[] = $fila;
        }

        return $tablaUsuarios;
    }
}