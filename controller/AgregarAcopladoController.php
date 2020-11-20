<?php


class AgregarAcopladoController
{
    private $render;
    private $agregarAcopladoModel;

    public function __construct($render, $agregarAcopladoModel)
    {
        $this->render = $render;
        $this->agregarAcopladoModel = $agregarAcopladoModel;
    }

    public function ejecutar()
    {
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;
            if ($_SESSION["rol"] == "admin") {
                $data["usuarioAdmin"] = true;
            }
            $data["patenteAcopladoError"]= isset($_GET["patenteAcopladoError"]) ? $_GET["patenteAcopladoError"] : false;
            $data["agregoAcopladoExitosamente"]= isset($_GET["agregoAcopladoExitosamente"]) ? $_GET["agregoAcopladoExitosamente"] : false;


            echo $this->render->render("view/agregarAcopladoView.php", $data);
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

    public function verificarQueUsuarioEsteLogeado()
    {
        $logeado = isset($_SESSION["logeado"]) ? $_SESSION["logeado"] : null;
        if ($logeado == 1) {
            return true;
        }
        return false;
    }
}
