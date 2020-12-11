<?php

class CosteoModel
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    function calcularKilometrosConCoordenadas($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo)
    {
        $rad = M_PI / 180;
        $theta = $longitudeFrom - $longitudeTo;
        $dist = sin($latitudeFrom * $rad)
            * sin($latitudeTo * $rad) +  cos($latitudeFrom * $rad)
            * cos($latitudeTo * $rad) * cos($theta * $rad);
        return acos($dist) / $rad * 60 *  1.853;
    }

    public function precioPorKilometro ($idImoSubClass, $idTipoCarga, $idTipoAcoplado, $idReefer){
        $precioKilometros = 250;
        $sql = "select precio_kilometro from precios
                where id_tipo_carga = ".$idTipoCarga."
                and id_tipo_acoplado = ". $idTipoAcoplado;
        if($idImoSubClass!=null){
            $sql = $sql. " and id_imo_sub_class = ". $idImoSubClass;
        }
        if($idReefer!=null){
            $sql = $sql." and id_reefer = ". $idReefer;
        }
        $sql = $sql . ";";

        $result = $this->bd->query($sql);
        while ($fila = $result->fetch_assoc()) {
            $precios[] = $fila;
        }

        if(!empty($precios)) {
            if ($precios[0]['precio_kilometro'] != null) {
                $precioKilometros = $precios[0]['precio_kilometro'];
            }
        }
        return $precioKilometros;
    }

    public function precioDeLaDistancia($kilometros, $precioKilometros){
        return round($precioKilometros * $kilometros, 2);
    }

    public function calcularDistanciaEnKilometros($direccionDestino, $direccionPartida)
    {
        $apikey="NDO-x9Q1-wRAQe2VukMxSHEhNY4ue8C5Y9ESpD_XwCk";
        $direccionDestino = str_replace(" ", "+", $direccionDestino);
        $direccionPartida = str_replace(" ", "+", $direccionPartida);
        $query = $direccionPartida. ",+Argentina";
        $localidadPartida = file_get_contents("https://geocode.search.hereapi.com/v1/geocode?q=".$query
            ."&apiKey=".$apikey);
        $query = $direccionDestino. ",+Argentina";
        $localidadDestino = file_get_contents("https://geocode.search.hereapi.com/v1/geocode?q=".$query
            ."&apiKey=".$apikey);
        $localidadPartida = json_decode($localidadPartida, true);
        $latitudPartida = $localidadPartida['items'][0]['position']['lat'];
        $longitudPartida = $localidadPartida['items'][0]['position']['lng'];

        $localidadDestino = json_decode($localidadDestino, true);
        $latitudDestino = $localidadDestino['items'][0]['position']['lat'];
        $longitudDestino = $localidadDestino['items'][0]['position']['lng'];
        $kilometros = $this->calcularKilometrosConCoordenadas($latitudPartida,$longitudPartida,
            $latitudDestino,$longitudDestino);

        return $kilometros;
    }

}