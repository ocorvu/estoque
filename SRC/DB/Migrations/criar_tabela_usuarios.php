<?php

require_once "../../../vendor/autoload.php";

use ocorvu\Estoque\Controller\UsuarioController;
use ocorvu\Estoque\DB\Database;

function criar()
{
    $db = Database::conection();
    $sql = "CREATE TABLE IF NOT EXISTS usuarios (
              id INTEGER PRIMARY KEY AUTOINCREMENT,
              nivel_acesso INTEGER NOT NULL,
              nome CHARACTER VARYING(8) NOT NULL,
              usuario CHARACTER VARYING(8) NOT NULL UNIQUE,
              senha INTEGER NOT NULL
            )";
    try {
        $db->query($sql);
        
        echo "Tabela 'usuarios' criada com sucesso!" . PHP_EOL;
    }
    catch (\PDOException $e) {
        echo $e->getMessage() . PHP_EOL;
    }
}

function derrubar()
{
    $db = Database::conection();
    $sql = "DROP TABLE IF EXISTS usuarios";
    try {
        $db->query($sql);
    }
    catch (\PDOException $e) {
        echo $e->getMessage() . PHP_EOL;
    }
}

function userAdmin()
{
    $userController = new UsuarioController();

    $userController->cadastrarUsuario(3, 'admin', 'admin');

    foreach ($userController->usuarios() as $usuario) {
        echo "Admin: {$usuario['nome']} - Senha: {$usuario['senha']}" . PHP_EOL;
    }
   
}

derrubar();
criar();

userAdmin();