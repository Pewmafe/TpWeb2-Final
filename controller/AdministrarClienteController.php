<?php

class AdministrarClienteController
{
    private $render;
    private $administrarClienteModel;
    private $administrarDireccionModel;
    private $loginSession;

    public function __construct($render, $loginSession, $administrarClienteModel, $administrarDireccionModel)
    {
        $this->render = $render;
        $this->loginSession = $loginSession;
        $this->administrarClienteModel = $administrarClienteModel;
        $this->administrarDireccionModel = $administrarDireccionModel;
    }

    public function ejecutar()
    {
        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        $data["titulo"] = "Admin Clientes";
        if ($logeado) {
            $data["login"] = true;
            $clientes = $this->administrarClienteModel->obtenerClientesNoDadosDeBaja();
            $data['tablaClientes'] =$clientes;

            $data["bajaCliente"] = isset($_GET["bajaCliente"]) ? $_GET["bajaCliente"] : false;

            $data2 = $this->loginSession->verificarQueUsuarioRol();
            $dataMerge = array_merge($data, $data2);
            echo $this->render->render("view/administrarClienteView.php", $dataMerge);
            exit();
        }
        echo $this->render->render("view/administrarClienteView.php");

    }

    public function darDeBajaCliente(){
        $cuit = $_POST["botonDarDeBajaClienteModal"];
        $this->administrarClienteModel->darDeBajaCliente($cuit);

        header("Location: /administrarCliente?bajaCliente=true");
        exit();
    }

    public function modificarCliente(){

    }

}