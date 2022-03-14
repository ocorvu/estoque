<?php

require_once "../../../vendor/autoload.php";

use ocorvu\Estoque\DB\Database;

function criar()
{
    $db = Database::conection();
    $sql = "CREATE TABLE IF NOT EXISTS produtos (
              id SERIAL PRIMARY KEY,
              descricao CHARACTER VARYING(30) NOT NULL UNIQUE,
              quantidade INTEGER NOT NULL,
              data_cadastro DATE NOT NULL,
              data_alteracao DATE NOT NULL
            )";
    try {
        $db->query($sql);
    }
    catch (\PDOException $e) {
        echo $e->getMessage();
    }
}

function derrubar()
{
    $db = Database::conection();
    $sql = "DROP TABLE produtos";
    try {
        $db->query($sql);
    }
    catch (\PDOException $e) {
        echo $e->getMessage();
    }
}

function tabela() 
{
    $db = Database::conection();
    $sql = "SELECT 
                column_name,
                data_type
            FROM
                information_schema.columns
            WHERE
                table_name = 'produtos'
            ";
    $busca = $db->query($sql);

    foreach ($busca as $linha => $coluna) {
        echo $coluna['column_name'] .  "-" .  $coluna['data_type'] . PHP_EOL;
    }
}
