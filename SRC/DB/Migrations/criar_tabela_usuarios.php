<?php

require_once "../../../vendor/autoload.php";

use ocorvu\Estoque\DB\Database;

function criar()
{
    $db = Database::conection();
    $sql = "CREATE TABLE IF NOT EXISTS usuarios (
              id SERIAL PRIMARY KEY,
              nivel_acesso INTEGER NOT NULL,
              nome CHARACTER VARYING(8) NOT NULL,
              usuario CHARACTER VARYING(8) NOT NULL UNIQUE,
              senha INTEGER NOT NULL
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
    $sql = "DROP TABLE IF EXISTS usuarios";
    try {
        $db->query($sql);
    }
    catch (\PDOException $e) {
        echo $e->getMessage();
    }
}

derrubar();
criar();