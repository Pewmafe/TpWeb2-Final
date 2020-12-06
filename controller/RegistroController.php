<?php


class RegistroController
{
    private $render;
    private $registroModel;

    public function __construct($render, $registroModel)
    {
        $this->render = $render;
        $this->registroModel = $registroModel;
    }

    public function ejecutar()
    {
        $data["titulo"] = "Registro";
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

        if (!($dniExistente) || !($nombreUsuarioExistente)) {
            $this->registroModel->registrarUsuario($nombreUsuario, $contrasenia, $dni, $nombre, $apellido, $fechaNacimiento);
        }

        $datos = array('nombreUsuarioError' => $nombreUsuarioExistente, 'dniError' => $dniExistente);
        echo json_encode($datos);

    }
}