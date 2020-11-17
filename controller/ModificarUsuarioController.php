<?php


class ModificarUsuarioController
{

    private $render;
    private $ModificarUsuarioModel;

    public function __construct($render, $ModificarUsuarioModel)
    {
        $this->render = $render;
        $this->ModificarUsuarioModel = $ModificarUsuarioModel;
    }

    public function ejecutar()
    {
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;
            if ($_SESSION["rol"] == "admin") {
                $data["usuarioAdmin"] = true;
            }
            $data["nombreUsuario"] = $_SESSION["nombreUsuario"];
            echo $this->render->render("view/modificarUsuarioView.php", $data);
            exit();
        }
        echo $this->render->render("view/modificarUsuarioView.php");
    }

    public function verificarQueUsuarioEsteLogeado()
    {
        $logeado = isset($_SESSION["logeado"]) ? $_SESSION["logeado"] : null;
        if ($logeado == 1) {
            return true;
        }
        return false;
    }

    public function modificarNombreUsuario()
    {
        $nombreUsuario = $_POST["nombre"];
        $nombreUsuarioExistente = $this->ModificarUsuarioModel->verificarNombreUsuarioExistente($nombreUsuario);
        $logeado = $this->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;
            if ($_SESSION["rol"] == "admin") {
                $data["usuarioAdmin"] = true;
            }
            $data["nombreUsuario"] = $_SESSION["nombreUsuario"];
            if (!$nombreUsuarioExistente) {

                $this->ModificarUsuarioModel->modificarNombre($nombreUsuario);
                $data["modificacionExitosa"] = "Actualizacion exitosa del nombre";
                $data["nombreUsuario"] = $_SESSION["nombreUsuario"];
                echo $this->render->render("view/modificarUsuarioView.php", $data);
                exit();
            } else {
                $data["nombreExistente"] = "El nombre de usuario ya existe";
                echo $this->render->render("view/modificarUsuarioView.php", $data);
                exit();
            }
            echo $this->render->render("view/modificarUsuarioView.php", $data);
            exit();
        }


    }
}