<?php


class AdministrarClienteModel
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function obtenerClientesNoDadosDeBaja()
    {
        $tablaCliente = array();
        $sql = "SELECT  * 
                from cliente c JOIN direccion d 
                                ON d.id = c.direccion
                WHERE c.eliminado = 0";
        $resultQuery = $this->bd->query($sql);

        while ($fila = $resultQuery->fetch_assoc()) {
            $tablaCliente[] = $fila;
        }
        return $tablaCliente;
    }

    public function obtenerClientesPorCuit($id)
    {
        $sql = "SELECT  * from cliente where cuit = '" . $id . "'";

        $resultQuery = $this->bd->query($sql);

        while ($fila = $resultQuery->fetch_assoc()) {
            $tablaCliente[] = $fila;
        }
        return $tablaCliente;
    }

    public function modificarCliente($cuitAModificar, $email, $nombre, $apellido, $telefono, $denominacion, $contacto1, $contacto2, $cuit)
    {
        $sql = "UPDATE cliente
                SET email='" . $email . "', nombre='" . $nombre . "', apellido='" . $apellido . "', telefono=" . $telefono . ", 
                denominacion='" . $denominacion . "', contacto1 = '" . $contacto1 . "', contacto2= '" . $contacto2 . "', cuit=" . $cuitAModificar . "
                WHERE cuit=" . $cuit;
        $this->bd->query($sql);
    }

    public function agregarCliente($cuit, $email, $nombre, $apellido, $telefono, $direccion, $denominacion)
    {
        $sql = "INSERT INTO cliente (cuit, email, nombre, apellido, telefono, direccion, denominacion) 
        VALUES(" . $cuit . ", '" . $email . "', '" . $nombre . "', '" . $apellido . "', " . $telefono . ", " . $direccion . ", '" . $denominacion . "')";

        $this->bd->query($sql);
    }

    public function borrarCliente($cuit)
    {
        $sql = "DELETE FROM cliente WHERE cuit=" . $cuit;
        $this->bd->query($sql);
    }

    public function darDeBajaCliente($cuit)
    {
        $sql = "UPDATE cliente SET eliminado = '1' WHERE cliente.cuit = " . $cuit;
        $this->bd->query($sql);
    }

    public function verificarCuitClienteExistente($cuit, $cuitAModificar)
    {
        $resultado = false;

        $sql = "SELECT cuit FROM cliente 
                WHERE cuit <>" . $cuit;

        $resultadoQuery = $this->bd->query($sql);

        while ($fila = $resultadoQuery->fetch_assoc()) {
            $tablaClientes[] = $fila;
        }
        for ($i = 0; $i < sizeof($tablaClientes); $i++) {
            if ($tablaClientes[$i]["cuit"] == $cuitAModificar) {
                $resultado = true;
            }
        }
        return $resultado;
    }
}
