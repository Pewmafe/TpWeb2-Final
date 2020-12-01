<?php
require_once("public/qr/phpqrcode/qrlib.php");

class ChoferController
{
    private $render;
    private $ChoferModel;
    private $loginSession;


    public function __construct($render, $loginSession, $ChoferModel)
    {
        $this->render = $render;
        $this->loginSession = $loginSession;
        $this->ChoferModel = $ChoferModel;
    }

    public function ejecutar()
    {
        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;
            $data["nombreUsuario"] = $_SESSION["nombreUsuario"];
            $tablaProforma= $this->ChoferModel->obtenerProformas();
            $data["tablaProforma"]= $tablaProforma;
            $data["dirQR"] = $this->generarQR();

            $data2 = $this->loginSession->verificarQueUsuarioRol();
            $dataMerge = array_merge($data, $data2);
            echo $this->render->render("view/choferView.php", $dataMerge);
            exit();
        }
        echo $this->render->render("view/choferView.php");
    }

    public function generarQR(){

        $dir = "public/qr/temp/";

        if (!file_exists($dir)) {
            mkdir($dir);
        }

        $filename = $dir . 'test.png';

        $tamanio = 10;
        $level = 'M';
        $frameSize = 3;
        $contenido = 'Acá va la url de la view para el chofer';


        QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);


        return $filename;


    }
}