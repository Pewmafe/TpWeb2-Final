<?php
require_once("public/qr/phpqrcode/qrlib.php");

define("activo", 1);
define("pendiente", 2);
define("finalizado", 3);


class ChoferController
{
    private $render;
    private $ChoferModel;
    private $loginSession;


    public function __construct($render, $loginSession, $ChoferModel)
    {
        $this->render = $render;
        $this->loginSession = $loginSession;
        $this->ChoferModel = $ChoferModel;
    }

    public function ejecutar()
    {
        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        $data["titulo"] = "Viajes";
        if ($logeado) {
            $data["login"] = true;
            $data["nombreUsuario"] = $_SESSION["nombreUsuario"];

            $tablaProforma = $this->ChoferModel->obtenerProformas();
            $data["tablaProforma"] = $tablaProforma;
            $data["dirQR"] = $this->generarQR();
            $data["idChofer"] = $_SESSION["idEmpleado"];
            if (isset($_SESSION["idEmpleado"])) {

                $tablaDeViajesActivo = ($this->ChoferModel->obtenerViajePorEstadoYChofer(activo, $_SESSION["idEmpleado"])) != null ? $this->ChoferModel->obtenerViajePorEstadoYChofer(activo, $_SESSION["idEmpleado"]) : null;
                $data["tablaDeViajesActivo"] = $tablaDeViajesActivo;

                $tablaDeViajesPendientes = ($this->ChoferModel->obtenerViajePorEstadoYChofer(pendiente, $_SESSION["idEmpleado"])) != null ? $this->ChoferModel->obtenerViajePorEstadoYChofer(pendiente, $_SESSION["idEmpleado"]) : null;
                $data["tablaDeViajesPendientes"] = $tablaDeViajesPendientes;

                $tablaDeViajesFinalizados = ($this->ChoferModel->obtenerViajePorEstadoYChofer(finalizado, $_SESSION["idEmpleado"])) != null ? $this->ChoferModel->obtenerViajePorEstadoYChofer(finalizado, $_SESSION["idEmpleado"]) : null;
                $data["tablaDeViajesFinalizados"] = $tablaDeViajesFinalizados;


                $tablaDeTodosLosViajesActivos = ($this->ChoferModel->obtenerViajePorEstado(activo)) != null ? $this->ChoferModel->obtenerViajePorEstado(activo) : null;
                $data["tablaDeTodosLosViajesActivos"] = $tablaDeTodosLosViajesActivos;


                $tablaDeTodosLosViajesPendientes = ($this->ChoferModel->obtenerViajePorEstado(pendiente)) != null ? $this->ChoferModel->obtenerViajePorEstado(pendiente) : null;
                $data["tablaDeTodosLosViajesPendientes"] = $tablaDeTodosLosViajesPendientes;

                $tablaDeTodosLosViajesActivos = ($this->ChoferModel->obtenerViajePorEstado(finalizado)) != null ? $this->ChoferModel->obtenerViajePorEstado(finalizado) : null;
                $data["tablaDeTodosLosViajesActivos"] = $tablaDeTodosLosViajesActivos;
            }

            $data2 = $this->loginSession->verificarQueUsuarioRol();
            $dataMerge = array_merge($data, $data2);
            echo $this->render->render("view/choferView.php", $dataMerge);
            exit();
        }
        echo $this->render->render("view/choferView.php");
    }


    public function generarQR()
    {

        $dir = "public/qr/temp/";

        if (!file_exists($dir)) {
            mkdir($dir);
        }

        $filename = $dir . 'test.png';

        $tamanio = 10;
        $level = 'H';
        $frameSize = 1;
        $contenido = 'http://localhost/qrChofer';


        QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);


        return $filename;
    }
}
