<?php

class AdministrarClienteController
{
    private $render;
    private $administrarClienteModel;
    private $loginSession;

    public function __construct($render, $loginSession, $administrarClienteModel)
    {
        $this->render = $render;
        $this->loginSession = $loginSession;
        $this->administrarClienteModel = $administrarClienteModel;
    }

    public function ejecutar()
    {
        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        $data["titulo"] = "Admin Clientes";
        if ($logeado) {

        }

    }


}