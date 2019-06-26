<?php

namespace App\model;

abstract class Conexao
{
    protected $pdo;

    public function __construct()
    {
        $host   = "192.168.1.202";
        $port   = 3306;
        $user   = "estuda";
        $pass   = "3565wnPPLqy75DE8";
        $dbname = "estuda";

        $dsn = "mysql:host={$host};dbname={$dbname};port={$port}";

        $this->pdo = new \PDO($dsn,$user,$pass);
        $this->pdo->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
    }
}