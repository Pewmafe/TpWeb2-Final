<?php


class AdministrarDireccionModel
{
    private $bd;

    public function __construct($bd)
    {
        $this->bd = $bd;
    }

    public function buscarDireccionPorNombreYNumero($calle, $altura)
    {
        $sql = "select d.id, d.calle ,d.altura ,
                l.descripcion as 'localidad' ,p.descripcion as 'provincia'
                from direccion d 
                join localidad l on d.localidad = l.id 
                join provincia p on p.id = l.provincia_id 
                where d.altura = " . $altura . " and d.calle like '%" . $calle . "%';";
        $resultQuery = $this->bd->query($sql);
        while ($fila = $resultQuery->fetch_assoc()) {
            $direcciones[] = $fila;
        }
        return $direcciones;
    }

    public function existeDireccion($id)
    {
        $sql = "select * from direccion where id = " . $id;
        $resultQuery = $this->bd->query($sql);
        return !empty($resultQuery->fetch_assoc());
    }

    public function existeLocalidad($id)
    {
        $sql = "select * from direccion where id = " . $id;
        $resultQuery = $this->bd->query($sql);
        return !empty($resultQuery->fetch_assoc());
    }

    public function buscarLocalidadPorDescripcionYProvinciaId($localidad, $provincia)
    {
        $sql = "select * from localidad where descripcion like '%" . $localidad . "%' and provincia_id = " . $provincia;
        $resultQuery = $this->bd->query($sql);
        while ($fila = $resultQuery->fetch_assoc()) {
            $localidades[] = $fila;
        }
        return $localidades;
    }

    public function buscarProvinciaPorNombre($nombre)
    {
        {
            $sql = "select * from provincia where descripcion like = '%" . $nombre . "%'";
            $resultQuery = $this->bd->query($sql);
            while ($fila = $resultQuery->fetch_assoc()) {
                $provincia[] = $fila;
            }
            return $provincia;
        }
    }

    public function existeProvincia($id)
    {
        $sql = "select * from provincia where id = " . $id;
        $resultQuery = $this->bd->query($sql);
        return !empty($resultQuery->fetch_assoc());
    }

    public function agregarProvincia($descripcion)
    {
        if (!empty($this->buscarProvinciaPorNombre($descripcion))) {
            $sql = "INSERT INTO provincia (descripcion) VALUES('" . $descripcion . "');";
            $this->bd->query($sql);
        }
    }

    public function agregarLocalidad($descripcion, $provincia)
    {
        if ($this->existeProvincia($provincia)
            && empty($this->buscarLocalidadPorDescripcionYProvinciaId($descripcion, $provincia))) {
            $sql = "INSERT INTO localidad (descripcion, provincia_id) VALUES('" . $descripcion . "', " . $provincia . ");";
            $this->bd->query($sql);
        }
    }
}