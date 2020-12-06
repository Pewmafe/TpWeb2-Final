<?php


class AgregarVehiculoController
{
    private $render;
    private $agregarVehiculoModel;
    private $loginSession;

    public function __construct($render, $loginSession, $agregarVehiculoModel)
    {
        $this->render = $render;
        $this->loginSession = $loginSession;
        $this->agregarVehiculoModel = $agregarVehiculoModel;
    }

    public function ejecutar()
    {
        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        $data["titulo"] = "Agregar vehiculo";
        if ($logeado) {
            $data["login"] = true;

            $data["patenteVehiculoError"] = isset($_GET["patenteVehiculoError"]) ? $_GET["patenteVehiculoError"] : false;
            $data["agregoVehExitosamente"] = isset($_GET["agregoVehExitosamente"]) ? $_GET["agregoVehExitosamente"] : false;

            $data2 = $this->loginSession->verificarQueUsuarioRol();
            $dataMerge = array_merge($data, $data2);
            echo $this->render->render("view/agregarCamionView.php", $dataMerge);
            exit();
        }
        echo $this->render->render("view/agregarCamionView.php");
    }

    public function agregarVehiculo()
    {
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;
            if ($_SESSION["rol"] == "admin") {
                $data["usuarioAdmin"] = true;
            }

            $patente = $_POST["patente"];
            $nroChasis = $_POST["nroChasis"];
            $nroMotor = $_POST["nroMotor"];
            $kilometraje = $_POST["kilometraje"];
            $fabricacion = $_POST["fabricacion"];
            $marca = $_POST["marca"];
            $modelo = $_POST["modelo"];
            $calendarioService = $_POST["calendarioService"];

            $patenteExistente = $this->agregarVehiculoModel->verificarPatenteExistente($patente);


            if ($patenteExistente) {
                header("Location: /agregarVehiculo?patenteVehiculoError=true");
                exit();
            }


            $this->agregarVehiculoModel->agregarVehiculo($patente,
                $nroChasis,
                $nroMotor,
                $kilometraje,
                $fabricacion,
                $marca,
                $modelo,
                $calendarioService);


            header("Location: /agregarVehiculo?agregoVehExitosamente=true");
            exit();
        }

    }
}