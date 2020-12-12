<?php


class RegistroEmpleadoController
{
    private $render;
    private $registroEmpleadoModel;
    private $loginSession;

    public function __construct($render, $loginSession, $registroEmpleadoModel)
    {
        $this->render = $render;
        $this->loginSession = $loginSession;
        $this->registroEmpleadoModel = $registroEmpleadoModel;
    }

    public function ejecutar()
    {
        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        $data["titulo"] = "Hacerlo empleado";
        if ($logeado) {
            $data["login"] = true;

            $data["nombreUsuarioError"] = isset($_GET["nombreUsuarioError"]) ? $_GET["nombreUsuarioError"] : false;
            $data["registroExitoso"] = isset($_GET["registroExitoso"]) ? $_GET["registroExitoso"] : false;
            $data["nombreUsuario"] = isset($_GET["nombreUsuario"]) ? $_GET["nombreUsuario"] : false;
            $data["camposVacios"] = isset($_GET["camposVacios"]) ? $_GET["camposVacios"] : false;

            $data2 = $this->loginSession->verificarQueUsuarioRol();
            $dataMerge = array_merge($data, $data2);
            echo $this->render->render("view/registroEmpleadoView.php", $dataMerge);
            exit();
        }
        echo $this->render->render("view/registroEmpleadoView.php");
    }

    public function registroEmpleado()
    {
        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        if ($logeado) {

            $tipoLicencia = isset($_POST["tipoLicencia"]) ? $_POST["tipoLicencia"] : null;
            $rolAsignar = isset($_POST["rolAsignar"]) ? $_POST["rolAsignar"] : null;
            $nombreUsuario = isset($_POST["nombreUsuario"]) ? $_POST["nombreUsuario"] : null;

            $nombreUsuarioExistente = $this->registroEmpleadoModel->verificarNombreUsuarioExistente($nombreUsuario);

            if (!$nombreUsuarioExistente) {
                header("Location: /registroEmpleado?nombreUsuarioError=true");
                exit();
            }

            if($tipoLicencia != null and $rolAsignar != null and $nombreUsuario != null){
                $this->registroEmpleadoModel->registrarEmpleado($tipoLicencia, $rolAsignar, $nombreUsuario);
            }else{
                header("Location: /registroEmpleado?camposVacios=true");
                exit();
            }


            $data["registroExitoso"] = true;
            header("Location: /registroEmpleado?registroExitoso=true");
            exit();
        }

    }
}