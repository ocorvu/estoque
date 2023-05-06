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
            if ($_ENV['DRIVER'] == 'sqlite') {
                if (basename(getcwd()) == 'estoque') {
                    $dsn = $_ENV['DRIVER'] . ':' . $_ENV['DATABASE_PATH'];
                }
                else {
                    $dsn = $_ENV['DRIVER'] . ':' . $_ENV['DATABASE'];
                }
                $conn = new PDO($dsn, options: [
                    \PDO::ATTR_EMULATE_PREPARES => false,
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
                ]);
            }
            else {
                $dsn = $_ENV['DRIVER'] . ':host=' . $_ENV['HOST'] . ';port=' . $_ENV['PORT'] . ';dbname=' . $_ENV['DATABASE'];
                $conn = new PDO($dsn, $_ENV['USER'], $_ENV['PASSWORD'], [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]);
            }
        
            if ($conn) {
                return $conn;
            }
        } catch (PDOException $e) {
            die(PHP_EOL . $e->getMessage() . PHP_EOL . PHP_EOL);
        }
    }

}
