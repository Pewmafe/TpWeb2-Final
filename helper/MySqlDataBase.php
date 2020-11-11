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
        $result = $this->conneccion->query($sql);

    }

    public function executar($sql)
    {
        mysqli_query($this->conneccion, $sql);
    }

    public function devolverDatos($tablaAdevolcer)
    {

        $sql = "SELECT * FROM " . $tablaAdevolcer;
        $resultadoQuery = $this->conneccion->query($sql);
        $tabla = array();
        while ($fila = $resultadoQuery->fetch_assoc()) {

            $tabla[] = $fila;
        }
        return $tabla;
    }
}