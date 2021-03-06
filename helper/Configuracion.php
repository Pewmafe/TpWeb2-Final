<?php
include_once("helper/MysqlDataBase.php");
include_once("helper/Render.php");
include_once("helper/UrlHelper.php");
include_once("helper/LoginSession.php");

include_once("controller/HomeController.php");
include_once("controller/LoginController.php");
include_once("controller/RegistroController.php");
include_once("controller/RegistroEmpleadoController.php");
include_once("controller/AdministrarUsuariosController.php");
include_once("controller/AdministrarEquiposController.php");
include_once("controller/ModificarUsuarioController.php");
include_once("controller/AgregarVehiculoController.php");
include_once("controller/AgregarAcopladoController.php");
include_once("controller/ChoferController.php");
include_once("controller/CrearProformaController.php");
include_once("controller/QrChoferController.php");
include_once("controller/PdfProformaController.php");
include_once("controller/AdministrarClienteController.php");
include_once("controller/ServiceController.php");
include_once("controller/MantenimientoController.php");
include_once("controller/ServiceHistorialController.php");

include_once("model/CosteoModel.php");
include_once("model/RegistroModel.php");
include_once("model/LoginModel.php");
include_once("model/AdministrarUsuariosModel.php");
include_once("model/ModificarUsuarioModel.php");
include_once("model/AdministrarEquiposModel.php");
include_once("model/AgregarVehiculoModel.php");
include_once("model/AgregarAcopladoModel.php");
include_once("model/ChoferModel.php");
include_once("model/QrChoferModel.php");
include_once("model/CrearProformaModel.php");
include_once("model/AdministrarDireccionModel.php");
include_once("model/AdministrarClienteModel.php");
include_once("model/MantenimientoModel.php");
include_once("model/ServiceModel.php");
include_once("model/ServiceHistorialModel.php");

include_once('third-party/mustache/src/Mustache/Autoloader.php');
include_once("Router.php");

class Configuracion
{
    private function getDatabase()
    {
        $config = $this->getConfiguracion();
        return new MysqlDatabase(
            $config["servername"],
            $config["username"],
            $config["password"],
            $config["dbname"]
        );
    }

    private function getConfiguracion()
    {
        return parse_ini_file("config/config.ini");
    }

    public function getRender()
    {
        return new Render('view/partial');
    }

    public function getLoginSession()
    {
        return new LoginSession();
    }

    public function getRouter()
    {
        return new Router($this);
    }

    public function getUrlHelper()
    {
        return new UrlHelper();
    }

    public function getHomeController()
    {
        $loginSession = $this->getLoginSession();
        return new HomeController($this->getRender(), $loginSession);
    }

    public function getLoginController()
    {
        $loginSession = $this->getLoginSession();
        $loginModel = $this->getLoginModel();
        return new LoginController($this->getRender(), $loginSession, $loginModel);
    }

    public function getRegistroController()
    {
        $loginSession = $this->getLoginSession();
        $registroModel = $this->getRegistroModel();
        return new RegistroController($this->getRender(), $loginSession, $registroModel);
    }

    public function getRegistroEmpleadoController()
    {
        $loginSession = $this->getLoginSession();
        $registroModel = $this->getRegistroModel();
        return new RegistroEmpleadoController($this->getRender(), $loginSession, $registroModel);
    }

    public function getAdministrarUsuariosController()
    {
        $loginSession = $this->getLoginSession();
        $administrarUsuarioModel = $this->getAdministrarUsuariosModel();
        return new AdministrarUsuariosController($this->getRender(), $loginSession, $administrarUsuarioModel);
    }

    public function getModificarUsuarioController()
    {
        $loginSession = $this->getLoginSession();
        $modificarUsuarioModel = $this->getModificarUsuarioModel();
        return new ModificarUsuarioController($this->getRender(), $loginSession, $modificarUsuarioModel);
    }

    public function getAdministrarEquiposController()
    {
        $loginSession = $this->getLoginSession();
        $administrarEquiposModel = $this->getAdministrarEquiposModel();
        return new AdministrarEquiposController($this->getRender(), $loginSession, $administrarEquiposModel);
    }

    public function getAgregarVehiculoController()
    {
        $loginSession = $this->getLoginSession();
        $agregarVehiculoModel = $this->getAgregarVehiculoModel();
        return new AgregarVehiculoController($this->getRender(), $loginSession, $agregarVehiculoModel);
    }

    public function getAgregarAcopladoController()
    {
        $loginSession = $this->getLoginSession();
        $agregarAcopladoModel = $this->getAgregarAcopladoModel();
        return new AgregarAcopladoController($this->getRender(), $loginSession, $agregarAcopladoModel);
    }

    public function getChoferController()
    {
        $choferModel = $this->getChoferModel();
        $loginSession = $this->getLoginSession();
        return new ChoferController($this->getRender(), $loginSession, $choferModel);
    }

    public function getCrearProformaController()
    {
        $proformaModel = $this->getCrearProformaModel();
        $loginSession = $this->getLoginSession();
        $costeoModel = $this->getCosteoModel();
        $qrChoferModel = $this->getQrChoferModel();
        return new CrearProformaController($this->getRender(), $loginSession, $proformaModel, $costeoModel, $qrChoferModel);
    }

    public function getQrChoferController()
    {
        $loginSession = $this->getLoginSession();
        $qrChoferModel = $this->getQrChoferModel();
        return new QrChoferController($this->getRender(), $qrChoferModel, $loginSession);
    }

    public function getPdfProformaController()
    {
        $choferModel = $this->getChoferModel();
        $loginSession = $this->getLoginSession();
        return new PdfProformaController($this->getRender(), $loginSession, $choferModel);
    }

    public function getServiceController()
    {
        $serviceModel = $this->getServiceModel();
        $loginSession = $this->getLoginSession();
        $render = $this->getRender();
        return new ServiceController($render, $loginSession, $serviceModel);
    }

    public function getMantenimientoController()
    {
        $mantenimientoModel = $this->getMantenimientoModel();
        $loginSession = $this->getLoginSession();
        $render = $this->getRender();
        return new MantenimientoController($render, $loginSession, $mantenimientoModel);
    }

    public function getServiceHistorialController()
    {
        $serviceHistorialModel = $this->getServiceHistorialModel();
        $loginSession = $this->getLoginSession();
        $render = $this->getRender();
        return new ServiceHistorialController($render, $loginSession, $serviceHistorialModel);
    }

    public function getAgregarAcopladoModel()
    {
        $bd = $this->getDatabase();
        return new AgregarAcopladoModel($bd);
    }

    public function getAgregarVehiculoModel()
    {
        $bd = $this->getDatabase();
        return new AgregarVehiculoModel($bd);
    }

    public function getRegistroModel()
    {
        $bd = $this->getDatabase();
        return new RegistroModel($bd);
    }

    public function getLoginModel()
    {
        $bd = $this->getDatabase();
        return new LoginModel($bd);
    }

    public function getAdministrarUsuariosModel()
    {
        $bd = $this->getDatabase();
        return new AdministrarUsuariosModel($bd);
    }


    public function getModificarUsuarioModel()
    {
        $bd = $this->getDatabase();
        return new ModificarUsuarioModel($bd);
    }

    public function getAdministrarEquiposModel()
    {
        $bd = $this->getDatabase();
        return new AdministrarEquiposModel($bd);
    }

    public function getChoferModel()
    {
        $bd = $this->getDatabase();
        return new ChoferModel($bd);
    }

    public function getQrChoferModel()
    {
        $bd = $this->getDatabase();
        return new QrChoferModel($bd);
    }

    public function getCrearProformaModel()
    {
        $bd = $this->getDatabase();
        return new CrearProformaModel($bd);
    }

    public function getCosteoModel()
    {
        $bd = $this->getDatabase();
        return new CosteoModel($bd);
    }

    public function getAdministrarClienteModel()
    {
        $bd = $this->getDatabase();
        return new AdministrarClienteModel($bd);
    }

    public function getAdministrarDireccionModel()
    {
        $bd = $this->getDatabase();
        return new AdministrarDireccionModel($bd);
    }

    public function getAdministrarClienteController()
    {
        $loginSession = $this->getLoginSession();
        $render = $this->getRender();
        $cliente = $this->getAdministrarClienteModel();
        $direccion = $this->getAdministrarDireccionModel();
        return new AdministrarClienteController($render, $loginSession, $cliente, $direccion);
    }

    public function getServiceModel()
    {
        $bd = $this->getDatabase();
        return new ServiceModel($bd);
    }

    public function getMantenimientoModel()
    {
        $bd = $this->getDatabase();
        return new MantenimientoModel($bd);
    }

    public function getServiceHistorialModel()
    {
        $bd = $this->getDatabase();
        return new ServiceHistorialModel($bd);
    }
}