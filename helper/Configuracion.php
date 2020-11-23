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

include_once("model/RegistroModel.php");
include_once("model/LoginModel.php");
include_once("model/AdministrarUsuariosModel.php");
include_once("model/ModificarUsuarioModel.php");
include_once("model/AdministrarEquiposModel.php");
include_once("model/AgregarVehiculoModel.php");
include_once("model/AgregarAcopladoModel.php");
include_once("model/ChoferModel.php");
include_once("model/CrearProformaModel.php");

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
        $loginModel = $this->getLoginModel();
        return new LoginController($this->getRender(), $loginModel);
    }

    public function getRegistroController()
    {
        $registroModel = $this->getRegistroModel();
        return new RegistroController($this->getRender(), $registroModel);
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
        return new CrearProformaController($this->getRender(), $loginSession, $proformaModel);
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


    private function getModificarUsuarioModel()
    {
        $bd = $this->getDatabase();
        return new ModificarUsuarioModel($bd);
    }

    public function getAdministrarEquiposModel()
    {
        $bd = $this->getDatabase();
        return new AdministrarEquiposModel($bd);
    }

    private function getChoferModel()
    {
        $bd = $this->getDatabase();
        return new ChoferModel($bd);
    }

    private function getCrearProformaModel()
    {
        $bd = $this->getDatabase();
        return new CrearProformaModel($bd);
    }
}