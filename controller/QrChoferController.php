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

    public function crearSeguimiento()
    {

        $combustible = isset($_POST["combustible"]) ? $_POST["combustible"] : null;
        $kilometros = isset($_POST["kilometros"]) ? $_POST["kilometros"] : null;
        $peajes = isset($_POST["peajes"]) ? $_POST["peajes"] : null;
        $latitud = isset($_POST["latitud_actual"]) ? $_POST["latitud_actual"] : null;
        $longitud = isset($_POST["longitud_actual"]) ? $_POST["longitud_actual"] : null;
        $idProforma = isset($_POST["idProforma"]) ? $_POST["idProforma"] : null;

        ini_set("date.timezone", "America/Argentina/Buenos_Aires");
        $fecha = date("Y-m-d H:i:s", time());

        $this->qrModel->guardarSeguimiento($idProforma, $combustible, $latitud, $longitud, $kilometros,
            $peajes, $fecha);

        header("Location: /chofer?seguimientoCreado=true");
        exit();


    }
}