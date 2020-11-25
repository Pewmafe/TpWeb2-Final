<?php


class MySqlDataBase
{
    private $conneccion;

    public function __construct($servername, $username, $password, $dbname)
    {
        $conn = mysqli_connect(
            $servername,
            $username,
            $password,
            $dbname
        );

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $this->conneccion = $conn;
    }

    public function query($sql)
    {
        $resultadoQuery = $this->conneccion->query($sql);

        if (!$resultadoQuery) {
            echo("error al ejecutar query<br>");
            echo $this->conneccion->error . "-" . $this->conneccion->error;
            exit();
        }
        return $resultadoQuery;

    }

    public function queryQueDevuelveId($sql)
    {
        $resultadoQuery = $this->conneccion->query($sql);

        if (!$resultadoQuery) {
            echo("error al ejecutar query<br>");
            echo $this->conneccion->error . "-" . $this->conneccion->error;
            exit();
        }
        return $this->conneccion->insert_id;

    }


    public function devolverDatos($tablaAdevolcer)
    {

        $sql = "SELECT * FROM " . $tablaAdevolcer;
        $resultadoQuery = $this->query($sql);
        $tabla = array();
        while ($fila = $resultadoQuery->fetch_assoc()) {

            $tabla[] = $fila;
        }
        return $tabla;
    }
}