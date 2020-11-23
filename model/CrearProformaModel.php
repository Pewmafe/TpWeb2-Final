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
            $tablaUsuarios[] = $fila;
        }
        return $tablaUsuarios;
    }
}
