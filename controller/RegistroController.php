<?php


class RegistroController
{
    private $render;
    private $registroModel;
    private $loginSession;

    public function __construct($render, $loginSession, $registroModel)
    {
        $this->render = $render;
        $this->loginSession = $loginSession;
        $this->registroModel = $registroModel;
    }

    public function ejecutar()
    {
        $data["titulo"] = "Registro";
        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;

            $data2 = $this->loginSession->verificarQueUsuarioRol();
            $dataMerge = array_merge($data, $data2);

            echo $this->render->render("view/registroView.php", $dataMerge);
            exit();
        }
        echo $this->render->render("view/registroView.php", $data);
    }

    public function registroUsuario()
    {
        $nombreUsuario = $_POST["NombreUsuario"];
        $dni = $_POST["dni"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $fechaNacimiento = $_POST["fechaNacimiento"];
        $contrasenia = $_POST["contrasenia"];

        $nombreUsuarioExistente = $this->registroModel->verificarNombreUsuarioExistente($nombreUsuario);
        $dniExistente = $this->registroModel->verificarDNIUsuarioExistente($dni);

        if (!($nombreUsuarioExistente) and !($dniExistente)) {
            $this->registroModel->registrarUsuario($nombreUsuario, $contrasenia, $dni, $nombre, $apellido, $fechaNacimiento);
        }

        $datos = array('nombreUsuarioError' => $nombreUsuarioExistente, 'dniError' => $dniExistente);
        echo json_encode($datos);

    }
}