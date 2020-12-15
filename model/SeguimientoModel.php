<?php


class SeguimientoModel
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function obtenerSeguimientosPorViajeYChofer($idViaje, $idChofer)
    {
        $sql = "select * from seguimiento s 
                join viaje v on s.viaje = v.id 
                where v.id = ".$idViaje." and chofer_id = ".$idChofer.";";

        $resultadoQuery = $this->bd->query($sql);

        while ($fila = $resultadoQuery->fetch_assoc()) {
            $seguimientos[] = $fila;
        }
        return $seguimientos;
    }

    public function guardarSeguimiento($viaje, $combustibleConsumido, $latitudActual, $longitudActual, $kmRecorridos,
        $peaje, $fecha){

        $sqlPosicion = "INSERT INTO posicion (x, y) VALUES(" . $latitudActual . ", " . $longitudActual . ");";
        $idPosicion = $this->bd->queryQueDevuelveId($sqlPosicion);

        $sql = "INSERT INTO seguimiento (combustible_consumido, posicion_actual, km_recorridos, viaje, peaje, fecha) 
                VALUES(".$combustibleConsumido.", ".$idPosicion.", ".$kmRecorridos.", ".$viaje.", ".$peaje.", 
                '".$fecha."');";

        return $this->bd->queryQueDevuelveId($sql);
    }

}
