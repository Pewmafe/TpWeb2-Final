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

            $data["errorDatos"] = isset($_GET["errorDatos"]) ? $_GET["errorDatos"] : false;
            $data["registroMantenimientoExitoso"] = isset($_GET["registroMantenimientoExitoso"]) ? $_GET["registroMantenimientoExitoso"] : false;


            $tablaCamionesLibres = $this->serviceModel->obtenerListaCamionesLibres();
            $data['tablaCamionesLibres'] = $tablaCamionesLibres;

            $tablaCamionesService = $this->serviceModel->obtenerListaCamionesEnService();
            $data['tablaCamionesService'] = $tablaCamionesService;

            $data2 = $this->loginSession->verificarQueUsuarioRol();
            $dataMerge = array_merge($data, $data2);
            echo $this->render->render("view/serviceView.php", $dataMerge);
            exit();
        }
        echo $this->render->render("view/serviceView.php");
    }

    public function mandarUnVehiculoAMantenimiento(){
        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $idMecanico = isset($_POST["mecanicosParaService"])? $_POST["mecanicosParaService"] : null;
            $patenteVehiculo = isset($_POST["botonMandarAService"])? $_POST["botonMandarAService"] : null;

            if($idMecanico==null or $patenteVehiculo==null){
                header('Location: /service?errorDatos=true');
                exit();
            }
            $kmVehiculo = $this->serviceModel->obtenerKmVehiculoPorPatente($patenteVehiculo);

            $this->serviceModel->registrarUnMantenimiento($idMecanico, $patenteVehiculo, $kmVehiculo);
            $this->serviceModel->setearEstadoVehiculoEnMantenimientoPorPatente($patenteVehiculo);
            header('Location: /service?registroMantenimientoExitoso=true');
            exit();
        }
        header('Location: /service');
        exit();
    }

    public function obtenerEmpleadosMecanicos()
    {
        $listaMecanicos = $this->serviceModel->obtenerListaEmpleadosMecanicos();
        echo $listaMecanicos;
    }

    public function obtenerDatosDelMecanicoPorID()
    {
        $idMecanico = $_POST["mecanicoId"];
        $datosMecanico = $this->serviceModel->obtenerDatosEmpleadoMecanicoPorId($idMecanico);
        echo(json_encode($datosMecanico));
    }
}