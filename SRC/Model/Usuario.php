<?php

namespace ocorvu\Estoque\Model;

use ocorvu\Estoque\DB\Database;

class Usuario
{
    public function registar($nivel_acesso, $usuarioLogin, $nome)
    {
        $usuarios = Database::conection();

        $senha = random_int(100, 500);

        if ($this->verificaSenha($senha)) {
            $senha = random_int(501, 999);
        }

        $sql = "INSERT INTO usuarios (`nivel_acesso`, `usuario`, `nome`, `senha`)
                VALUES ('$nivel_acesso', '$usuarioLogin', '$nome', '$senha')";

        $usuarios->query($sql);
    }

    public function usuarios() 
    {
        $usuarios = Database::conection();

        $sql = "SELECT id, nivel_acesso, usuario, nome, senha FROM usuarios";

        $busca = $usuarios->query($sql);

        return $busca;
    }

    public function verificaSenha($senha)
    {
        $usuario = Database::conection();

        $sql = "SELECT senha FROM usuarios";
        
        $busca = $usuario->query($sql);
        foreach ($busca as $linha => $coluna) {
            if ($senha == $coluna['senha']) {
                return true;
            }
        }
    }
}


