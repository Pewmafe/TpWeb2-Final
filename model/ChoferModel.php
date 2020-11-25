<?php


class ChoferModel
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function obtenerProformas(){
        $sql = "SELECT p.id, c.nombre, c.apellido
                FROM proforma as p JOIN cliente as c 
                                    ON c.cuit = p.cliente_cuit
                                   JOIN viaje as v
                                    ON v.id = p.viaje_id
                GROUP BY p.id, c.nombre, c.apellido";
        $resultadoQuery = $this->bd->query($sql);

        while($fila = $resultadoQuery->fetch_assoc()){
            $tablaProforma[] = $fila;
        }
        return $tablaProforma;
    }
}