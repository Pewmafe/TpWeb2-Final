<?php


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
        if ($logeado) {
            $data["login"] = true;
            $usuarioAdmin = $this->loginSession->verificarQueUsuarioEsAdmin();
            if ($usuarioAdmin) {
                $data["usuarioAdmin"] = true;
                $data["usuarioChofer"] = true;
                $data["usuarioSupervisor"] = true;
            }

            $usuarioSupervisor = $this->loginSession->verificarQueUsuarioEsSupervisor();
            if ($usuarioSupervisor) {
                $data["usuarioSupervisor"] = true;
                $data["usuarioChofer"] = true;

            }
            $usuarioChofer = $this->loginSession->verificarQueUsuarioEsChofer();
            if ($usuarioChofer) {
                $data["usuarioChofer"] = true;
            }
            $data["nombreUsuario"] = $_SESSION["nombreUsuario"];
            echo $this->render->render("view/choferView.php", $data);
            exit();
        }
        echo $this->render->render("view/choferView.php");
    }
}