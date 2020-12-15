<?php


class QrChoferController
{
    private $render;
    private $qrModel;
    private $loginSession;

    public function __construct($render, $qrModel, $loginSession)
    {
        $this->render = $render;
        $this->qrModel = $qrModel;
        $this->loginSession = $loginSession;
    }

    public function ejecutar()
    {

        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;

            $data2 = $this->loginSession->verificarQueUsuarioRol();
            $dataMerge = array_merge($data, $data2);

            echo $this->render->render("view/qrChoferView.php", $dataMerge);
            exit();
        }
        echo $this->render->render("view/qrChoferView.php");
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