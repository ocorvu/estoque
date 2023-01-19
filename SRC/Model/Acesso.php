<?php

namespace ocorvu\Estoque\Model;
use ocorvu\Estoque\DB\Database;

class Acesso
{
    public static function login($usuario, $senha)
    {
        $usuarios = Database::conection();
        $sql = "SELECT nivel_acesso, usuario, nome, senha FROM usuarios WHERE usuario = '$usuario'";

        $busca = $usuarios->query($sql);
    
        foreach ($busca as $linha => $coluna) {
            if ($usuario == $coluna['usuario'] && $senha == $coluna['senha']) {
                $_SESSION['usuario'] = $coluna['usuario'];
                $_SESSION['nome'] = $coluna['nome'];
                $_SESSION['nivel'] = $coluna['nivel_acesso'];
                $_SESSION['logged'] = true;
            } else {
                return false;
            }
        }
    }

    public static function sair()
    {
        header('location: ../../../index.php');
        $_SESSION['logged'] = false;
        $_SESSION = [];
        session_destroy();
    }

    public static function nivel($nivelAcesso)
    {
        switch ($nivelAcesso) {
            case 1:
                header("location: ./SRC/VIEW/usuario/painel.php");
                break;
            case 2:
                header("location: ./SRC/VIEW/usuario/painel.php");
                break;
            case 3:
                header("location: /admin/painel");
                break;
            default:
                break;
        }
    }

    public static function notLogged()
    {
        if (!$_SESSION['logged']) {
            header("location: /");
        }
    }
}
