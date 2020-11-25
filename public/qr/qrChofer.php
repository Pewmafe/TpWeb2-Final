<?php
require_once("phpqrcode/qrlib.php");


    $dir = "temp/";

    if (!file_exists($dir)){
        mkdir($dir);
    }

    $filename = $dir.'test.png';

    $tamanio = 10;
    $level = 'M';
    $frameSize = 3;
    $contenido = 'Hola Q tal soy un QR';

    QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);

    echo '<img src="'.$filename.'" />';

?>