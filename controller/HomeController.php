<?php

class HomeController
{
    private $render;

    public function __construct($render)
    {
        $this->render = $render;
    }

    public function ejecutar()
    {
        echo $this->render->render("view/home.php");
    }
}