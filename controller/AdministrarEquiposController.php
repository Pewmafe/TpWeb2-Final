<?php


class AdministrarEquiposController
{
    private $render;
    private $administrarEquiposModel;
    private $loginSession;

    public function __construct($render, $loginSession, $administrarEquiposModel)
    {
        $this->render = $render;
        $this->loginSession = $loginSession;
        $this->administrarEquiposModel = $administrarEquiposModel;
    }

    public function ejecutar()
    {
        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;

            $data["bajaVehiculo"] = isset($_GET["bajaVehiculo"]) ? $_GET["bajaVehiculo"] : false;
            $data["bajaAcoplado"] = isset($_GET["bajaAcoplado"]) ? $_GET["bajaAcoplado"] : false;

            $tablaCamiones = $this->administrarEquiposModel->obtenerCamiones();
            $tablaAcoplados = $this->administrarEquiposModel->obtenerAcoplados();

            $data['tablaCamiones'] = $tablaCamiones;
            $data['tablaAcoplados'] = $tablaAcoplados;

            $data2 = $this->loginSession->verificarQueUsuarioRol();
            $dataMerge = array_merge($data, $data2);
            echo $this->render->render("view/administrarEquiposView.php", $dataMerge);
            exit();
        }
        echo $this->render->render("view/administrarEquiposView.php");
    }

    public function eliminarVehiculo()
    {
        $patenteVehAEliminar = $_POST["botonDarDeBajaCamionModal"];

        $this->administrarEquiposModel->eliminarVehiculo($patenteVehAEliminar);

        header("Location: /administrarEquipos?bajaVehiculo=true");
        exit();
    }

    public function eliminarAcoplado()
    {
        $patenteAcopAEliminar = $_POST["botonDarDeBajaAcopladoModal"];

        $this->administrarEquiposModel->eliminarAcoplado($patenteAcopAEliminar);

        header("Location: /administrarEquipos?bajaAcoplado=true");
        exit();
    }

    public function modificarVehiculo(){
        $patenteAModificar = $_POST["patente"];
        $nroChasisAModificar = $_POST["nroChasis"];
        $nroMotorAModificar = $_POST["nroMotor"];
        $kilometrajeAModificar = $_POST["kilometraje"];
        $fabricacionAModificar = $_POST["fabricacion"];
        $marcaAModificar = $_POST["marca"];
        $modeloAModificar = $_POST["modelo"];
        $calendarioServiceAModificar = $_POST["calendarioService"];
        $patenteCamionQueSeVaAModificar = $_POST["botonModificarCamion"];

        $patenteExistente = $this->administrarEquiposModel->verificarPatenteCamionExistente($patenteCamionQueSeVaAModificar, $patenteAModificar);

        if ($patenteExistente) {
            header("Location: /modificarVehiculo?patenteVehiculoError=true");
            exit();
        }


    }
}