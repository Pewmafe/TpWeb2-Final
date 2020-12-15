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
        $direccion = 'public/qr/imgQr';
        $nombre ='qrProforma'.  $idProforma . '.png';

        QRcode::png("http://localhost/qrChofer&idProforma=$idProforma&idChofer=$idChofer", $direccion . $nombre, QR_ECLEVEL_H);
    }


}