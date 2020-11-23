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
        if($logeado){
            $data["login"] = true;

            $usuarioAdmin = $this->loginSession->verificarQueUsuarioEsAdmin();
            if($usuarioAdmin){
                $data["usuarioAdmin"] = true;
                $data["usuarioSupervisor"] = true;
            }

            $usuarioSupervisor = $this->loginSession->verificarQueUsuarioEsSupervisor();
            if($usuarioSupervisor){
                $data["usuarioSupervisor"] = true;
            }

            $tablaChoferes = $this->crearProformaModel->obtenerUsuariosChoferes();

            $data["tablaChoferes"] = $tablaChoferes;

            echo $this->render->render("view/CrearProformaView.php", $data);
            exit();
        }
        echo $this->render->render("view/CrearProformaView.php");
    }
}