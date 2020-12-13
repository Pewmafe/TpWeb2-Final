<?php


class ServiceController
{
    private $render;
    private $serviceModel;
    private $loginSession;

    public function __construct($render, $loginSession, $serviceModel)
    {
        $this->render = $render;
        $this->loginSession = $loginSession;
        $this->serviceModel = $serviceModel;
    }

    public function ejecutar()
    {
        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        $data["titulo"] = "Service";
        if ($logeado) {
            $data["login"] = true;


            $data2 = $this->loginSession->verificarQueUsuarioRol();
            $dataMerge = array_merge($data, $data2);
            echo $this->render->render("view/serviceView.php", $dataMerge);
            exit();
        }
        echo $this->render->render("view/serviceView.php");
    }
}