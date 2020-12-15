<?php


class QrChoferController
{
    private $render;
    private $qrModel;
    private $loginSession;

    public function __construct($render, $qrModel, $loginSession)
    {
        $this->render = $render;
        $this->qrModel = $qrModel;
        $this->loginSession = $loginSession;
    }

    public function ejecutar()
    {

        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        if ($logeado) {

            if ($_SESSION["idEmpleado"] == $_GET["idChofer"] or $_SESSION["rol"] == "admin") {
                $data["login"] = true;
                $datos = $this->qrModel->mostrarNombreChofer($_GET["idChofer"]);

                $data["nombreChofer"] = $datos[0]["nombre"];
                $data["apellidoChofer"] = $datos[0]["apellido"];
                $data["idChofer"] = $_GET["idChofer"];
                $data["id_proforma"] = $_GET["idProforma"];
                $data2 = $this->loginSession->verificarQueUsuarioRol();
                $dataMerge = array_merge($data, $data2);

                echo $this->render->render("view/qrChoferView.php", $dataMerge);
                exit();
            }
        }
        echo $this->render->render("view/chofer?errorQR=true.php");
        
    }

    public function decodificarQr()
    {

        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;

            $data2 = $this->loginSession->verificarQueUsuarioRol();
            $dataMerge = array_merge($data, $data2);

            $archivo = $_FILES['qrimage']['tmp_name'];
            $textDecodificado = $this->qrModel->decodificarQrArchivo($archivo);

            header("Location: " . $textDecodificado);
            exit();
        }
        echo $this->render->render("view/home.php");
    }

}