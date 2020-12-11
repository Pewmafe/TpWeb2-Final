<?php


class AdministrarClienteModel
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function obtenerClientes(){
        $sql = "SELECT  * from cliente";
        $resultQuery = $this->bd->query($sql);

        while ($fila = $resultQuery->fetch_assoc()) {
            $tablaCliente[] = $fila;
        }
        return $tablaCliente;
    }

    public function obtenerClientesPorCuit($id){
        $sql = "SELECT  * from cliente where cuit = '".$id."'";

        $resultQuery = $this->bd->query($sql);

        while ($fila = $resultQuery->fetch_assoc()) {
            $tablaCliente[] = $fila;
        }
        return $tablaCliente;
    }

    public function modificarCliente($cuit, $email, $nombre, $apellido, $telefono, $direccion, $denominacion){
        $sql = "UPDATE cliente
                SET email='".$email."', nombre='".$nombre."', apellido='".$apellido."', telefono=".$telefono.", 
                direccion=".$direccion.", denominacion='".$denominacion."'
                WHERE cuit=".$cuit;
        $this->bd->query($sql);
    }

    public function agregarCliente($cuit, $email, $nombre, $apellido, $telefono, $direccion, $denominacion){
        $sql = "INSERT INTO cliente (cuit, email, nombre, apellido, telefono, direccion, denominacion) 
        VALUES(".$cuit.", '".$email."', '".$nombre."', '".$apellido."', ".$telefono.", ".$direccion.", '".$denominacion."')";

        $this->bd->query($sql);
    }

    public function borrarCliente($cuit){
        $sql = "DELETE FROM cliente WHERE cuit=".$cuit;
        $this->bd->query($sql);
    }

}
