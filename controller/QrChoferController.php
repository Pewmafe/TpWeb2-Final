<?php


class QrChoferController
{
    private $render;
    private $loginSession;

    public function __construct($render, $loginSession)
    {
        $this->render = $render;
        $this->loginSession = $loginSession;
    }

    public function ejecutar()
    {
        $data["guardadoExitoso"] = isset($_GET["guardadoExitoso"]) ? $_GET["guardadoExitoso"] : false;
        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;

            $data2 = $this->loginSession->verificarQueUsuarioRol();
            $dataMerge = array_merge($data, $data2);

            echo $this->render->render("view/qrChoferView.php", $dataMerge);
            exit();
        }
        echo $this->render->render("view/qrChoferView.php", $data);
    }
}