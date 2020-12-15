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
            $usuarioAdmin=isset($data2["usuarioAdmin"]) ? isset($data2["usuarioAdmin"]) : null;
            $usuarioMecanico = isset($data2["usuarioMecanico"]) ? isset($data2["usuarioMecanico"]) : null;

            $data["mantenimientoExito"] = isset($_GET["mantenimientoExito"]) ? $_GET["mantenimientoExito"] : false;

            if($usuarioAdmin !=null){
                $tablaCamionesService = $this->mantenimientoModel->obtenerListaCamionesEnService();
                $data['tablaCamionesService'] = $tablaCamionesService;
            }

            if($usuarioAdmin==null and $usuarioMecanico!=null){
                $tablaCamionesService = $this->mantenimientoModel->obtenerListaCamionesEnServicePorMecanicoId($_SESSION["idEmpleado"]);
                $data['tablaCamionesService'] = $tablaCamionesService;
            }


            $dataMerge = array_merge($data, $data2);
            echo $this->render->render("view/mantenimientoView.php", $dataMerge);
            exit();
        }
        echo $this->render->render("view/mantenimientoView.php");
    }

    public function finalizarServiceDeUnVehiculo(){
        $patenteVehiculo = $_POST["botonFinalizarServiceDeUnVehiculoModal"];
        $fechaFinalizacion = date("Y-m-d", time());

        $this->mantenimientoModel->setearEstadoVehiculoEnLibrePorPatente($patenteVehiculo);

        $idMantenimiento = $this->mantenimientoModel->obtenerElIdDeUnMantenimientoPorMecanicoYVehiculo($_SESSION["idEmpleado"],$patenteVehiculo);
        $this->mantenimientoModel->setearFechaDelServiceEnMantenimiento($fechaFinalizacion, $idMantenimiento);
        $this->mantenimientoModel->setearFechaDelUltimoServiceEnVehiculoPorPatente($patenteVehiculo,$fechaFinalizacion);

        header("Location: /mantenimiento?mantenimientoExito=true");
    }
}