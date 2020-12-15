<?php


class QrChoferController
{
    private $render;
    private $qrModel;
    private $loginModel;
    private $loginSession;

    public function __construct($render, $qrModel, $loginModel)
    {
        $this->render = $render;
        $this->qrModel = $qrModel;
        $this->loginModel = $loginModel;
    }

    public function ejecutar()
    {

        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;

            $data2 = $this->loginSession->verificarQueUsuarioRol();
            $dataMerge = array_merge($data, $data2);

            echo $this->render->render("view/escaneoQrView.php", $dataMerge);
            exit();
        }
        echo $this->render->render("view/escaneoQrView.php");
    }

    public function decodificarQr(){

        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;

            $data2 = $this->loginSession->verificarQueUsuarioRol();
            $dataMerge = array_merge($data, $data2);

            $archivo = $_FILES['qrimage']['tmp_name'];
            $textDecodificado = $this->qrModel->decodificarQrArchivo($archivo);

            header("Location: " . $textDecodificado);
            exit();
        }
        echo $this->render->render("view/escaneoQrView.php");
    }

}