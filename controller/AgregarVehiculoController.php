<?php


class AgregarVehiculoController
{
    private $render;
    private $agregarVehiculoModel;

    public function __construct($render , $agregarVehiculoModel)
    {
        $this->render = $render;
        $this->agregarVehiculoModel = $agregarVehiculoModel;
    }

    public function ejecutar()
    {
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        if($logeado){
            $data["login"] = true;
            if($_SESSION["rol"] == "admin"){
                $data["usuarioAdmin"] = true;
            }
            echo $this->render->render("view/agregarCamionView.php", $data);
            exit();
        }
        echo $this->render->render("view/agregarCamionView.php");
    }

    public function agregarVehiculo()
    {
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        if($logeado){
            $data["login"] = true;
            if($_SESSION["rol"] == "admin"){
                $data["usuarioAdmin"] = true;
            }

            $patente = $_POST["patente"];
            $nroChasis = $_POST["nroChasis"];
            $nroMotor = $_POST["nroMotor"];
            $kilometraje = $_POST["kilometraje"];
            $fabricacion = $_POST["fabricacion"];
            $marca =  $_POST["marca"];
            $modelo = $_POST["modelo"];
            $calendarioService = $_POST["calendarioService"];

            $patenteExistente = $this->agregarVehiculoModel->verificarPatenteExistente($patente);


            if(!$patenteExistente){
               $data["patenteVehError"] = "El vehículo con esa patente ya está agregado";
                echo $this->render->render("view/agregarCamion.php", $data);
                exit();
            }


            $this->agregarVehiculoModel->registrarEmpleado($patente,
                $nroChasis,
                $nroMotor,
                $kilometraje,
                $fabricacion,
                $marca,
                $modelo,
                $calendarioService);

            $data["agregoVehExitosamente"] = true;
            echo $this->render->render("view/home.php", $data);
        }

    }

    public function verificarQueUsuarioEsteLogeado(){
        $logeado = isset( $_SESSION["logeado"]) ?  $_SESSION["logeado"] : null;
        if($logeado == 1){
            return true;
        }
        return false;
    }
}