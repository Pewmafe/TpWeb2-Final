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
        }

        if ($this->verificarQueUsuarioEsSupervisor()) {
            $data["usuarioSupervisor"] = true;
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


}