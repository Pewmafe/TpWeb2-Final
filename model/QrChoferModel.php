<?php

require("vendor/autoload.php");
require_once("public/qr/phpqrcode/qrlib.php");

class QrChoferModel
{

    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function decodificarQrArchivo($archivo)
    {
        $qrcode = new \Zxing\QrReader($archivo);
        $text = $qrcode->text();

        return $text;
    }

    public function generarQr($idProforma, $idChofer)
    {
        $direccion = 'public/qr/imgQr/';
        $nombre = 'qrProforma' . $idProforma . '.png';

        QRcode::png("http://localhost/qrChofer?idProforma=$idProforma&idChofer=$idChofer", $direccion . $nombre, QR_ECLEVEL_H);
    }

    public function mostrarNombreChofer($idChofer)
    {
        $sql = "select UCh.nombre, UCh.apellido from empleado e 
                    join usuario UCh on e.dni_usuario = UCh.dni
                    where e.id = " . $idChofer;
        $resultadoQuery = $this->bd->query($sql);

        while ($fila = $resultadoQuery->fetch_assoc()) {
            $datos[] = $fila;
        }

        return $datos;
    }

    public function obtenerSeguimientosPorViajeYChofer($idViaje, $idChofer)
    {
        $sql = "select * from seguimiento s 
                join viaje v on s.viaje = v.id 
                where v.id = " . $idViaje . " and chofer_id = " . $idChofer . ";";

        $resultadoQuery = $this->bd->query($sql);

        while ($fila = $resultadoQuery->fetch_assoc()) {
            $seguimientos[] = $fila;
        }
        return $seguimientos;
    }

    public function guardarSeguimiento($idProforma, $combustibleConsumido, $latitudActual, $longitudActual, $kmRecorridos,
                                       $peaje, $fecha)
    {

        $sqlPosicion = "INSERT INTO posicion (x, y) VALUES(" . $latitudActual . ", " . $longitudActual . ");";

        $idPosicion = $this->bd->queryQueDevuelveId($sqlPosicion);

        $viaje = $this->obtenerIdViajeSegunIdProforma($idProforma);

        $sql = "INSERT INTO seguimiento (combustible_consumido, posicion_actual, km_recorridos, viaje, peaje, fecha) 
                VALUES(" . $combustibleConsumido . ", " . json_encode($idPosicion) . ", " . $kmRecorridos . ", " . $viaje . ", " . $peaje . ", 
                '" . $fecha . "')";

        $this->bd->query($sql);
    }

    public function obtenerIdViajeSegunIdProforma($idProforma)
    {
        $sql = "select p.viaje_id from proforma p where p.id= " . $idProforma;
        $resultado = $this->bd->query($sql);
        $idViaje = $resultado->fetch_assoc();
        return $idViaje["viaje_id"];
    }
}