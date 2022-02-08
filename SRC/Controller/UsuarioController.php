<?php

namespace ocorvu\Estoque\Controller;

use ocorvu\Estoque\Model\Usuario;

class UsuarioController
{
    public static function cadastrarUsuario($nivel_acesso, $usuarioLogin, $nome)
    {
        $usuario = new Usuario();
        $usuario->registar($nivel_acesso, $usuarioLogin, $nome);
    }

    public static function usuarios()
    {
        $usuarios = new Usuario();
        return $usuarios->usuarios();
    }
}

