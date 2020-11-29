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

            $clienteCuit = isset($_POST["clienteRegistradoCuit"])? $_POST["clienteRegistradoCuit"] : false;
            $clienteCuitExistente=false;
            $clienteCuitExistente=$this->crearProformaModel->verificarCuitClienteExistente($clienteCuit);

            $cargaTipo = isset($_POST["cargaTipo"])?  $_POST["cargaTipo"] : false;
            $cargaPeso = isset($_POST["cargaPeso"])?  $_POST["cargaPeso"] : false;



            $origenLocalidad = isset($_POST["origenLocalidad"])?  $_POST["origenLocalidad"] : false;
            $origenCalle= isset($_POST["origenCalle"])? $_POST["origenCalle"] : false;
            $origenAltura = isset($_POST["origenAltura"])? $_POST["origenAltura"] : false;



            $destinoLocalidad = isset($_POST["destinoLocalidad"])? $_POST["destinoLocalidad"] : false;
            $destinoCalle = isset($_POST["destinoCalle"])? $_POST["destinoCalle"] : false;
            $destinoAltura= isset($_POST["destinoAltura"])? $_POST["destinoAltura"] : false;



            $fechaSalida = isset($_POST["fechaSalida"])? $_POST["fechaSalida"] : false;
            $fechaLlegada = isset($_POST["fechaLlegada"])? $_POST["fechaLlegada"] : false;

            $vehiculoPatente= isset($_POST["vehiculoRadios"])? $_POST["vehiculoRadios"] : false;
            $acopladoPatente = isset($_POST["acopladoRadios"])? $_POST["acopladoRadios"] : false;

            $choferID = isset($_POST["choferRadios"])? $_POST["choferRadios"] : false;

            $camposVacios = false;
            if($clienteCuit != false and $cargaTipo != false and $cargaPeso != false and $origenLocalidad != false and $origenCalle != false and
                $origenAltura != false and $destinoLocalidad != false and $destinoCalle != false and $destinoAltura != false and
                $fechaSalida != false and $fechaLlegada != false and $vehiculoPatente != false and $acopladoPatente != false and
                $choferID != false){
                if($clienteCuitExistente==true){
                    $idCarga = $this->crearProformaModel->registrarCarga($cargaTipo, $cargaPeso);

                    $idDireccionOrigen=$this->crearProformaModel->registrarDireccion($origenCalle, $origenAltura, $origenLocalidad);

                    $idDireccionDestino=$this->crearProformaModel->registrarDireccion($destinoCalle, $destinoAltura, $destinoLocalidad);

                    $idViaje=$this->crearProformaModel->registrarViaje($idCarga, $acopladoPatente, $vehiculoPatente, $choferID, $fechaSalida, $fechaLlegada, $idDireccionDestino, $idDireccionOrigen);

                    $this->crearProformaModel->registrarProforma($clienteCuit, $idViaje);
                }
            }else{
                $camposVacios = true;
            }

            $datos =array('camposVacios'=>$camposVacios,'clienteCuitExistente'=> $clienteCuitExistente);
            echo json_encode($datos);
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