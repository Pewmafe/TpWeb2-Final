<?php
require_once("phpqrcode/qrlib.php");


    $dir = "/public/temp/";

    if (!file_exists($dir)){
        mkdir($dir);
    }

    $filename = $dir.'test.png';

    $tamanio = 10;
    $level = 'M';
    $frameSize = 3;
    $contenido = 'Acá va la url de la view para el chofer';



    QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);



    echo '<img src="'.$filename.'" />';

?>