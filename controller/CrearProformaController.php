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
            $data["clienteRegistrado"] = isset($_GET["clienteRegistrado"]) ? $_GET["clienteRegistrado"] : false;

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

            $clienteCuit = isset($_POST["clienteRegistradoCuit"])? $_POST["clienteRegistradoCuit"] : null;

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

    public function registrarCliente(){
        $logeado = $this->loginSession->verificarQueUsuarioEsteLogeado();
        if ($logeado) {
            $data["login"] = true;
            $clienteDenominacion = isset($_POST["clienteDenominacion"]) ? $_POST["clienteDenominacion"] : false;
            $clienteNombre = isset($_POST["clienteNombre"]) ? $_POST["clienteNombre"] : false;
            $clienteApellido = isset($_POST["clienteApellido"]) ? $_POST["clienteApellido"] : false;
            $clienteCuit = isset($_POST["clienteCuit"]) ? $_POST["clienteCuit"] : false;
            $clienteLocalidad = isset($_POST["clienteLocalidad"]) ? $_POST["clienteLocalidad"]: false;
            $clienteCalle = isset($_POST["clienteCalle"]) ? $_POST["clienteCalle"]: false;
            $clienteAltura = isset($_POST["clienteAltura"]) ? $_POST["clienteAltura"]: false;
            $clienteTelefono = isset($_POST["clienteTelefono"]) ? $_POST["clienteTelefono"]: false;

            $clienteCuitExistente=false;
            if(isset($_POST["clienteCuit"])){
                $clienteCuitExistente=$this->crearProformaModel->verificarCuitClienteExistente($clienteCuit);
            }


            if($clienteDenominacion!=false and $clienteNombre!=false and $clienteApellido!=false and $clienteCuit!=false and
                $clienteLocalidad!=false and $clienteCalle!=false and $clienteAltura!=false and $clienteTelefono!=false and
                $clienteCuitExistente==false){

                $idDireccionCliente=$this->crearProformaModel->registrarDireccion($clienteCalle, $clienteAltura, $clienteLocalidad);

                $this->crearProformaModel->registrarClienteConDireccion($idDireccionCliente, $clienteDenominacion,
                    $clienteNombre, $clienteApellido ,$clienteCuit, $clienteTelefono);
            }

            $datos =array('clienteDenominacion'=>$clienteDenominacion, 'clienteNombre'=>$clienteNombre, 'clienteApellido'=>$clienteApellido,
                'clienteCuit'=>$clienteCuit, 'clienteLocalidad'=>$clienteLocalidad, 'clienteCalle'=>$clienteCalle, 'clienteAltura'=>$clienteAltura,
                'clienteTelefono'=>$clienteTelefono, 'clienteCuitExistente'=>$clienteCuitExistente);
            echo json_encode($datos);
            exit();
        }
        echo $this->render->render("view/loginView.php");
    }
}