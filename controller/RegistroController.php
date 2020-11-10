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
        echo $this->render->render("view/registroView.php");
    }

    public function registroUsuario()
    {
        /*$nombre = $_GET["nombre"];
        $apellido = $_GET["apellido"];
        $email = $_GET["email"];*/
        $contrasenia = $_POST["contrasenia"];
        /*$fechaNacimiento = $_GET["fechaNacimiento"];*/
        $NombreUsuario = $_POST["NombreUsuario"];
        /* $Dni = $_GET["Dni"];
         $licencia = $_GET["licencia"];*/

        $this->registroModel->registrarUsuario($NombreUsuario, $contrasenia);

        echo $this->render->render("view/home.php");
    }
}