<?php

namespace ocorvu\Estoque\DB;
use PDO;
use PDOException;

require_once "env.php";

class Database 
{
    public static function conection()
    {
        try {
            $dsn = 'pgsql:host=' . $_ENV['HOST'] . ';port=' . $_ENV['PORT'] . ';dbname=' . $_ENV['DATABASE'];

            $conn = new PDO($dsn, $_ENV['USER'], $_ENV['PASSWORD'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        
            if ($conn) {
                return $conn;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

}
