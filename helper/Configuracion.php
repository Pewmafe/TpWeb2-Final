<?php
include_once("helper/MysqlDataBase.php");
include_once("helper/Render.php");
include_once("helper/UrlHelper.php");

include_once("controller/HomeController.php");
include_once("controller/LoginController.php");
include_once("controller/RegistroController.php");

include_once('third-party/mustache/src/Mustache/Autoloader.php');
include_once("Router.php");

class Configuracion
{
    private function getDatabase(){
        $config = $this->getConfiguracion();
        return new MysqlDatabase(
            $config["servername"],
            $config["username"],
            $config["password"],
            $config["dbname"]
        );
    }

    private function getConfiguracion(){
        return parse_ini_file("config/config.ini");
    }

    public function getRender(){
        return new Render('view/partial');
    }

    public function getRouter(){
        return new Router($this);
    }

    public function getUrlHelper(){
        return new UrlHelper();
    }

    public function getHomeController(){
        return new HomeController($this->getRender());
    }

    public function getLoginController(){
        return new LoginController($this->getRender());
    }

    public function getRegistroController(){
        return new RegistroController($this->getRender());
    }

}