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
        if ($logeado) {
            $data["login"] = true;

            $tablaChoferes = $this->crearProformaModel->obtenerUsuariosChoferes();
            $data["tablaChoferes"] = $tablaChoferes;

            $tablaVehiculos = $this->crearProformaModel->obtenerEquiposVehiculos();
            $data["tablaVehiculos"] = $tablaVehiculos;

            $tablaAcoplados = $this->crearProformaModel->obtenerEquiposAcoplados();
            $data["tablaAcoplados"] = $tablaAcoplados;

            $tablaDestinos = $this->crearProformaModel->obtenerLocalidades();
            $data["tablaDestinos"] = $tablaDestinos;

            $tablaTiposDeCarga = $this->crearProformaModel->obtenerTiposDeCarga();
            $data["tablaTiposDeCarga"] = $tablaTiposDeCarga;

            $data["proformaCreada"] = isset($_GET["proformaCreada"]) ? $_GET["proformaCreada"] : false;



            $data2 = $this->loginSession->verificarQueUsuarioRol();
            $dataMerge = array_merge($data, $data2);
            echo $this->render->render("view/CrearProformaView.php", $dataMerge);
            exit();
        }
        echo $this->render->render("view/CrearProformaView.php");
    }

    public function crearProforma(){
        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;


            $registroClienteRadios = $_POST["registroClienteRadios"];
            $clienteCuit = isset($_POST["clienteRegistradoCuit"])? $_POST["clienteRegistradoCuit"] : null;
            if($registroClienteRadios == "si"){
                $clienteDenominacion = $_POST["clienteDenominacion"];
                $clienteNombre = $_POST["clienteNombre"];
                $clienteApellido = $_POST["clienteApellido"];
                $clienteCuit = $_POST["clienteCuit"];
                $clienteLocalidad = $_POST["clienteLocalidad"];
                $clienteCalle = $_POST["clienteCalle"];
                $clienteAltura = $_POST["clienteAltura"];
                $clienteTelefono = $_POST["clienteTelefono"];
                $idDireccionCliente=$this->crearProformaModel->registrarDireccion($clienteCalle, $clienteAltura, $clienteLocalidad);
                $this->crearProformaModel->registrarClienteConDireccion($idDireccionCliente, $clienteDenominacion,
                    $clienteNombre, $clienteApellido ,$clienteCuit, $clienteTelefono);
            }



            $cargaTipo = $_POST["cargaTipo"];
            $cargaPeso = $_POST["cargaPeso"];
            $idCarga = $this->crearProformaModel->registrarCarga($cargaTipo, $cargaPeso);


            $origenLocalidad = $_POST["origenLocalidad"];
            $origenCalle= $_POST["origenCalle"];
            $origenAltura = $_POST["origenAltura"];
            $idDireccionOrigen=$this->crearProformaModel->registrarDireccion($origenCalle, $origenAltura, $origenLocalidad);


            $destinoLocalidad = $_POST["destinoLocalidad"];
            $destinoCalle = $_POST["destinoCalle"];
            $destinoAltura= $_POST["destinoAltura"];
            $idDireccionDestino=$this->crearProformaModel->registrarDireccion($destinoCalle, $destinoAltura, $destinoLocalidad);


            $fechaSalida = $_POST["fechaSalida"];
            $fechaLlegada = $_POST["fechaLlegada"];

            $vehiculoPatente= $_POST["vehiculoRadios"];
            $acopladoPatente = $_POST["acopladoRadios"];

            $choferID = $_POST["choferRadios"];
            $idViaje=$this->crearProformaModel->registrarViaje($idCarga, $acopladoPatente, $vehiculoPatente, $choferID, $fechaSalida, $fechaLlegada, $idDireccionDestino, $idDireccionOrigen);

            $this->crearProformaModel->registrarProforma($clienteCuit, $idViaje);

            header("Location: /crearProforma?proformaCreada=true");
            exit();
        }
        echo $this->render->render("view/loginView.php");
    }
}