<?php


class ServiceHistorialController
{
    private $render;
    private $serviceHistorialModel;
    private $loginSession;

    public function __construct($render, $loginSession, $serviceHistorialModel)
    {
        $this->render = $render;
        $this->loginSession = $loginSession;
        $this->serviceHistorialModel = $serviceHistorialModel;
    }

    public function ejecutar()
    {
        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        $data["titulo"] = "Service";
        if ($logeado) {
            $data["login"] = true;
            $patenteVehiculo = $_GET["patente"];
            $tablaMantenimientos = $this->serviceHistorialModel->obtenerListaDeMantenimientoPorPatenteDelVehiculo($patenteVehiculo);
            $data['tablaMantenimientos'] = $tablaMantenimientos;

            $data2 = $this->loginSession->verificarQueUsuarioRol();
            $dataMerge = array_merge($data, $data2);
            echo $this->render->render("view/serviceHistorialView.php", $dataMerge);
            exit();
        }
        echo $this->render->render("view/serviceHistorialView.php");
    }
}