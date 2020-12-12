<?php

class AdministrarClienteController
{
    private $render;
    private $administrarClienteModel;
    private $administrarDireccionModel;
    private $loginSession;

    public function __construct($render, $loginSession, $administrarClienteModel, $administrarDireccionModel)
    {
        $this->render = $render;
        $this->loginSession = $loginSession;
        $this->administrarClienteModel = $administrarClienteModel;
        $this->administrarDireccionModel = $administrarDireccionModel;
    }

    public function ejecutar()
    {
        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        $data["titulo"] = "Admin Clientes";
        if ($logeado) {
            $data["login"] = true;
            $clientes = $this->administrarClienteModel->obtenerClientesNoDadosDeBaja();
            $data['tablaClientes'] =$clientes;

            $data["bajaCliente"] = isset($_GET["bajaCliente"]) ? $_GET["bajaCliente"] : false;
            $data["modificarCliente"] = isset($_GET["modificarCliente"]) ? $_GET["modificarCliente"] : false;
            $data["cuitExistente"] = isset($_GET["cuitExistente"]) ? $_GET["cuitExistente"] : false;


            $data2 = $this->loginSession->verificarQueUsuarioRol();
            $dataMerge = array_merge($data, $data2);
            echo $this->render->render("view/administrarClienteView.php", $dataMerge);
            exit();
        }
        echo $this->render->render("view/administrarClienteView.php");

    }

    public function darDeBajaCliente(){
        $cuit = $_POST["botonDarDeBajaClienteModal"];
        $this->administrarClienteModel->darDeBajaCliente($cuit);

        header("Location: /administrarCliente?bajaCliente=true");
        exit();
    }

    public function modificarCliente(){
        $nombre= $_POST["nombre"];
        $apellido= $_POST["apellido"];
        $cuit=$_POST["botonModificarCliente"];
        $cuitAModificar = $_POST["cuit"];
        $denominacion= $_POST["denominacion"];
        $email= $_POST["email"];
        $telefono= $_POST["telefono"];
        $calle= $_POST["calle"];
        $altura= $_POST["altura"];
        $contacto1= isset($_POST["contacto1"])? $_POST["contacto1"] : null;
        $contacto2= isset($_POST["contacto2"])? $_POST["contacto2"] : null;

        $cuitClienteExistente = $this->administrarClienteModel->verificarCuitClienteExistente($cuit, $cuitAModificar);

        if($cuitClienteExistente){
            header("Location: /administrarCliente?cuitExistente=true");
            exit();
        }

        $this->administrarClienteModel->modificarCliente($cuitAModificar, $email, $nombre, $apellido, $telefono, $denominacion, $contacto1, $contacto2,$cuit);

        header("Location: /administrarCliente?modificarCliente=true");
        exit();
    }

}