<?php
include_once("helper/Configuracion.php");
session_start();
$configuracion = new Configuracion();

$urlHelper = $configuracion->getUrlHelper();
$module = $urlHelper->getModuleFromRequestOr("home");
$action = $urlHelper->getActionFromRequestOr("ejecutar");


$router = $configuracion->getRouter();
$router->executeActionFromModule($action, $module);
