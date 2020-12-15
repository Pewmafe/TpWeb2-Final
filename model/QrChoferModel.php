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

    public function generarQr($idViaje)
    {
        $direccion = 'public/qr/imgQr';
        $nombre = $idViaje . '.png';

        QRcode::png("idViaje=$idViaje", $direccion . $nombre, QR_ECLEVEL_H);
    }


}