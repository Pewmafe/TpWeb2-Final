<?php
include_once("helper/MysqlDataBase.php");
include_once("helper/Render.php");
include_once("helper/UrlHelper.php");

include_once("controller/HomeController.php");
include_once("controller/LoginController.php");
include_once("controller/RegistroController.php");
include_once("controller/RegistroEmpleadoController.php");
include_once("controller/AdministrarUsuarioController.php");
include_once("controller/ModificarUsuarioController.php");

include_once("model/RegistroModel.php");
include_once("model/LoginModel.php");
include_once("model/AdministrarUsuarioModel.php");
include_once("model/ModificarUsuarioModel.php");

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
        return new HomeController($this->getRender());
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
        $registroModel = $this->getRegistroModel();
        return new RegistroEmpleadoController($this->getRender(), $registroModel);
    }

    public function getAdministrarUsuarioController()
    {
        $administrarUsuarioModel = $this->getAdministrarUsuarioModel();
        return new AdministrarUsuarioController($this->getRender(), $administrarUsuarioModel);
    }

    public function getModificarUsuarioController()
    {
        $modificarUsuarioModel = $this->getModificarUsuarioModel();
        return new ModificarUsuarioController($this->getRender(), $modificarUsuarioModel);
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

    public function getAdministrarUsuarioModel()
    {
        $bd = $this->getDatabase();
        return new AdministrarUsuarioModel($bd);
    }

    private function getModificarUsuarioModel()
    {
        $bd = $this->getDatabase();
        return new ModificarUsuarioModel($bd);
    }

}