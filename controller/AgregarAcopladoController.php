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
                $data["patenteAcopladoError"] = "El acoplado con esa patente ya está agregado";
                echo $this->render->render("view/agregarAcopladoView.php", $data);
                exit();
            }


            $this->agregarAcopladoModel->agregarAcoplado($patente, $chasis, $tipoAcoplado);

            $data["agregoAcopladoExitosamente"] = true;
            echo $this->render->render("view/home.php", $data);
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
