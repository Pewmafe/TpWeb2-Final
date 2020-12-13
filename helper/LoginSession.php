<?php


class LoginSession
{
    public function verificarQueUsuarioEsteLogeado()
    {
        $logeado = isset($_SESSION["logeado"]) ? $_SESSION["logeado"] : null;
        if ($logeado == 1) {
            return true;
        }
        return false;
    }

    public function verificarQueUsuarioRol()
    {
        $data[] = false;
        if ($this->verificarQueUsuarioEsAdmin()) {
            $data["usuarioAdmin"] = true;
            $data["usuarioSupervisor"] = true;
            $data["usuarioChofer"] = true;
            $data["usuarioEncargado"] = true;
            $data["usuarioMecanico"] = true;
        }

        if ($this->verificarQueUsuarioEsSupervisor()) {
            $data["usuarioSupervisor"] = true;
        }

        if ($this->verificarQueUsuarioEsChofer()) {
            $data["usuarioChofer"] = true;
        }

        if ($this->verificarQueUsuarioEsEncargado()) {
            $data["usuarioEncargado"] = true;
        }

        if ($this->verificarQueUsuarioEsMecanico()) {
            $data["usuarioMecanico"] = true;
        }

        return $data;
    }

    public function verificarQueUsuarioEsAdmin()
    {
        $usuarioAdmin = false;
        if ($_SESSION["rol"] == "admin") {
            $usuarioAdmin = true;
        }
        return $usuarioAdmin;
    }

    public function verificarQueUsuarioEsSupervisor()
    {
        $usuarioSupervisor = false;
        if ($_SESSION["rol"] == "supervisor") {
            $usuarioSupervisor = true;
        }
        return $usuarioSupervisor;
    }

    public function verificarQueUsuarioEsChofer()
    {
        $usuarioChofer = false;
        if ($_SESSION["rol"] == "chofer") {
            $usuarioChofer = true;
        }
        return $usuarioChofer;
    }

    public function verificarQueUsuarioEsEncargado()
    {
        $usuarioEncargado = false;
        if ($_SESSION["rol"] == "encargado") {
            $usuarioEncargado = true;
        }
        return $usuarioEncargado;
    }

    public function verificarQueUsuarioEsMecanico()
    {
        $usuarioMecanico = false;
        if ($_SESSION["rol"] == "mecanico") {
            $usuarioMecanico = true;
        }
        return $usuarioMecanico;
    }


}