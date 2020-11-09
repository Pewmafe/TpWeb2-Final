<?php


class Router
{
    private $configuracion;

    public function __construct($configuracion)
    {
        $this->configuracion = $configuracion;
    }

    public function executeActionFromModule($action, $module){
        $controller = $this->getControllerFrom($module);
        $this->executeMethodFromController($controller,$action);
    }

    private function getControllerFrom($module){
        $controllerName = "get" . ucfirst($module) . "Controller";
        $validController = method_exists($this->configuracion, $controllerName) ?$controllerName : "getHomeController";
        return call_user_func(array($this->configuracion, $validController));
    }

    private function executeMethodFromController($controller, $method){
        $validMethod = method_exists($controller, $method) ?$method : "ejecutar";
        call_user_func(array($controller, $validMethod));
    }
}