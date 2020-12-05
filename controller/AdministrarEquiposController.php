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
            $data["patenteVehiculoError"] = isset($_GET["patenteVehiculoError"]) ? $_GET["patenteVehiculoError"] : false;
            $data["modificarCamionExitosamente"] = isset($_GET["modificarCamionExitosamente"]) ? $_GET["modificarCamionExitosamente"] : false;
            $data["patenteAcopladoError"] = isset($_GET["patenteAcopladoError"]) ? $_GET["patenteAcopladoError"] : false;
            $data["modificarAcopladoExitosamente"] = isset($_GET["modificarAcopladoExitosamente"]) ? $_GET["modificarAcopladoExitosamente"] : false;

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

    public function modificarCamion()
    {
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
            header("Location: /administrarEquipos?patenteVehiculoError=true");
            exit();
        }

        $this->administrarEquiposModel->modificarCamion($patenteAModificar, $nroChasisAModificar, $nroMotorAModificar,
            $kilometrajeAModificar, $fabricacionAModificar, $marcaAModificar,
            $modeloAModificar, $calendarioServiceAModificar, $patenteCamionQueSeVaAModificar);

        header("Location: /administrarEquipos?modificarCamionExitosamente=true");
        exit();

    }

    public function modificarAcoplado()
    {
        $patenteAModificar = $_POST["patente"];
        $chasisAModificar = $_POST["chasis"];
        $tipoAcopladoAModificar = $_POST["tipoAcoplado"];
        $patenteAcopladoQueSeVaAModificar = $_POST["botonModificarAcoplado"];

        $patenteExistente = $this->administrarEquiposModel->verificarPatenteAcopladoExistente($patenteAcopladoQueSeVaAModificar, $patenteAModificar);

        if ($patenteExistente) {
            header("Location: /administrarEquipos?patenteAcopladoError=true");
            exit();
        }

        $this->administrarEquiposModel->modificarAcoplado($patenteAModificar, $chasisAModificar, $tipoAcopladoAModificar,
            $patenteAcopladoQueSeVaAModificar);
        header("Location: /administrarEquipos?modificarAcopladoExitosamente=true");
        exit();
    }
}