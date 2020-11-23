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
            }

            $data["nombreUsuario"] = $_SESSION["nombreUsuario"];
            echo $this->render->render("view/choferView.php", $data);
            exit();
        }
        echo $this->render->render("view/choferView.php");
    }
}