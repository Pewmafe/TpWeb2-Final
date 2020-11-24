<?php


class AgregarAcopladoController
{
    private $render;
    private $agregarAcopladoModel;
    private $loginSession;

    public function __construct($render, $loginSession, $agregarAcopladoModel)
    {
        $this->render = $render;
        $this->loginSession = $loginSession;
        $this->agregarAcopladoModel = $agregarAcopladoModel;
    }

    public function ejecutar()
    {
        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;

            $data["patenteAcopladoError"]= isset($_GET["patenteAcopladoError"]) ? $_GET["patenteAcopladoError"] : false;
            $data["agregoAcopladoExitosamente"]= isset($_GET["agregoAcopladoExitosamente"]) ? $_GET["agregoAcopladoExitosamente"] : false;

            $data2 = $this->loginSession->verificarQueUsuarioRol();
            $dataMerge = array_merge($data, $data2);
            echo $this->render->render("view/agregarAcopladoView.php", $dataMerge);
            exit();
        }
        echo $this->render->render("view/agregarAcopladoView.php");
    }

    public function agregarAcoplado()
    {
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;
            if ($_SESSION["rol"] == "admin") {
                $data["usuarioAdmin"] = true;
            }

            $patente = $_POST["patente"];
            $chasis = $_POST["chasis"];
            $tipoAcoplado = $_POST["tipoAcoplado"];


            $patenteExistente = $this->agregarAcopladoModel->verificarPatenteExistente($patente);


            if ($patenteExistente) {
                header("Location: /agregarAcoplado?patenteAcopladoError=true");
                exit();
            }


            $this->agregarAcopladoModel->agregarAcoplado($patente, $chasis, $tipoAcoplado);


            header("Location: /agregarAcoplado?agregoAcopladoExitosamente=true");
            exit();
        }

    }
}
