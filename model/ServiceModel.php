<?php


class ServiceModel
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }
}