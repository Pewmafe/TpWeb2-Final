<?php


class ChoferModel
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function obtenerProformas()
    {
        $sql = "SELECT p.id, c.nombre, c.apellido
                FROM proforma as p JOIN cliente as c 
                                    ON c.cuit = p.cliente_cuit
                                   JOIN viaje as v
                                    ON v.id = p.viaje_id
                GROUP BY p.id, c.nombre, c.apellido";
        $resultadoQuery = $this->bd->query($sql);

        while ($fila = $resultadoQuery->fetch_assoc()) {
            $tablaProforma[] = $fila;
        }
        return $tablaProforma;
    }

    public function obtenerViajePorEstadoYChofer($estado, $idChofer)
    {

        $sql = "select  ep.descripcion as 'estado',
                        pd.descripcion as 'destino', 
                        pp.descripcion as 'partida',
                        j.eta, 
                        j.etd
                    from proforma p
                        join viaje j on p.viaje_id = j.id
                        join direccion dp on j.partida_id = dp.id
                        join direccion dd on j.destino_id = dd.id
                        join localidad lp on lp.id = dp.localidad
                        join localidad ld on ld.id = dd.localidad
                        join provincia pp on pp.id = lp.provincia_id
                        join provincia pd on pd.id = ld.provincia_id
                        join estado_proforma ep on ep.id = p.estado
                            where j.chofer_id =" . $idChofer . "
                            and p.estado = " . $estado;

        $resultado = $this->bd->query($sql);

        while ($fila = $resultado->fetch_assoc()) {

            $dateETA = new DateTime($fila["eta"]);
            $dateETD = new DateTime($fila["etd"]);

            if( (($dateETA->getTimestamp() - $dateETD->getTimestamp()) / 60 / 60) > 24 ){
                $diff = (($dateETA->getTimestamp() - $dateETD->getTimestamp()) / 60 / 60 / 24) . " Dias";
            }else{
                $diff = (($dateETA->getTimestamp() - $dateETD->getTimestamp()) / 60 / 60) . " Horas";
            }

            $fila["tiempo_estimado"] = $diff;
            $tablaDeViajes[] = $fila;
        }

        return $tablaDeViajes;
    }

}