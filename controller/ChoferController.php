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
        $data["finalizarProforma"] = isset($_GET["finalizarProforma"]) ? $_GET["finalizarProforma"] : false;
        $data["titulo"] = "Viajes";
        if ($logeado) {
            $data["login"] = true;
            $data["nombreUsuario"] = $_SESSION["nombreUsuario"];

            $tablaProforma = $this->ChoferModel->obtenerProformas();
            $data["tablaProforma"] = $tablaProforma;
            $data["dirQR"] = $this->generarQR();
            $data["idChofer"] = $_SESSION["idEmpleado"];
            $data2 = $this->loginSession->verificarQueUsuarioRol();


            if (isset($_SESSION["idEmpleado"])) {

                if (isset($data2["usuarioSupervisor"]) ? $data2["usuarioSupervisor"] : false) {
                    $tablaDeViajesActivo = ($this->ChoferModel->obtenerViajePorEstado(activo)) != null ? $this->ChoferModel->obtenerViajePorEstado(activo) : null;
                    $data["tablaDeViajesActivo"] = $tablaDeViajesActivo;

                    $tablaDeViajesPendientes = ($this->ChoferModel->obtenerViajePorEstado(pendiente)) != null ? $this->ChoferModel->obtenerViajePorEstado(pendiente) : null;
                    $data["tablaDeViajesPendientes"] = $tablaDeViajesPendientes;

                    $tablaDeViajesFinalizados = ($this->ChoferModel->obtenerViajePorEstado(finalizado)) != null ? $this->ChoferModel->obtenerViajePorEstado(finalizado) : null;
                    $data["tablaDeViajesFinalizados"] = $tablaDeViajesFinalizados;

                } else {
                    $tablaDeViajesActivo = ($this->ChoferModel->obtenerViajePorEstadoYChofer(activo, $_SESSION["idEmpleado"])) != null ? $this->ChoferModel->obtenerViajePorEstadoYChofer(activo, $_SESSION["idEmpleado"]) : null;
                    $data["tablaDeViajesActivo"] = $tablaDeViajesActivo;

                    $tablaDeViajesPendientes = ($this->ChoferModel->obtenerViajePorEstadoYChofer(pendiente, $_SESSION["idEmpleado"])) != null ? $this->ChoferModel->obtenerViajePorEstadoYChofer(pendiente, $_SESSION["idEmpleado"]) : null;
                    $data["tablaDeViajesPendientes"] = $tablaDeViajesPendientes;

                    $tablaDeViajesFinalizados = ($this->ChoferModel->obtenerViajePorEstadoYChofer(finalizado, $_SESSION["idEmpleado"])) != null ? $this->ChoferModel->obtenerViajePorEstadoYChofer(finalizado, $_SESSION["idEmpleado"]) : null;
                    $data["tablaDeViajesFinalizados"] = $tablaDeViajesFinalizados;

                }
            }


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
    public function finalizarProforma(){
        $idProforma = $_GET["proformaID"];
        $this->ChoferModel->finalizarProforma($idProforma);
        header("Location: /chofer&finalizarProforma=true");
        exit();

    }
}
