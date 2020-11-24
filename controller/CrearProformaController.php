<?php


class CrearProformaController
{
    private $render;
    private $loginSession;
    private $crearProformaModel;

    public function __construct($render, $loginSession, $crearProformaModel)
    {
        $this->render = $render;
        $this->loginSession = $loginSession;
        $this->crearProformaModel = $crearProformaModel;
    }

    public function ejecutar()
    {
        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;

            $tablaChoferes = $this->crearProformaModel->obtenerUsuariosChoferes();
            $data["tablaChoferes"] = $tablaChoferes;

            $tablaVehiculos = $this->crearProformaModel->obtenerEquiposVehiculos();
            $data["tablaVehiculos"] = $tablaVehiculos;

            $tablaAcoplados = $this->crearProformaModel->obtenerEquiposAcoplados();
            $data["tablaAcoplados"] = $tablaAcoplados;

            $tablaDestinos = $this->crearProformaModel->obtenerLocalidades();
            $data["tablaDestinos"] = $tablaDestinos;

            $tablaTiposDeCarga = $this->crearProformaModel->obtenerTiposDeCarga();
            $data["tablaTiposDeCarga"] = $tablaTiposDeCarga;


            $data2 = $this->loginSession->verificarQueUsuarioRol();
            $dataMerge = array_merge($data, $data2);
            echo $this->render->render("view/CrearProformaView.php", $dataMerge);
            exit();
        }
        echo $this->render->render("view/CrearProformaView.php");
    }
}