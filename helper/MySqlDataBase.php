<?php


class MySqlDataBase
{
    private $conneccion;

    public function __construct($servername, $username, $password, $dbname){
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

    public function query($sql){
        $resultado = mysqli_query($this->conneccion, $sql);
        return mysqli_fetch_all($resultado,MYSQLI_ASSOC);
    }

    public function executar($sql){
        mysqli_query($this->conneccion, $sql);
    }
}