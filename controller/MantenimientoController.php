<?php


class MantenimientoController
{
    private $render;
    private $mantenimientoModel;
    private $loginSession;

    public function __construct($render, $loginSession, $mantenimientoModel)
    {
        $this->render = $render;
        $this->loginSession = $loginSession;
        $this->mantenimientoModel = $mantenimientoModel;
    }

    public function ejecutar()
    {
        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        $data["titulo"] = "mantenimiento";
        if ($logeado) {
            $data["login"] = true;


            $data2 = $this->loginSession->verificarQueUsuarioRol();
            $dataMerge = array_merge($data, $data2);
            echo $this->render->render("view/mantenimientoView.php", $dataMerge);
            exit();
        }
        echo $this->render->render("view/mantenimientoView.php");
    }
}