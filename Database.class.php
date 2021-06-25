<?php

namespace app\tree;

use PDO;

class Database
{

    public $pdo;
    private $statement;
    public function __construct()
    {
        $DB_HOST = DB_HOST;
        $DB_NAME = DB_NAME;
        $DB_USER = DB_USER;
        $DB_PASS = DB_PASS;
        $this->pdo = new PDO("mysql:host={$DB_HOST};port=3306;dbname={$DB_NAME}", $DB_USER, $DB_PASS);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query($sql)
    {
        $this->statement = $this->pdo->prepare($sql);
    }

    public function bindValue($param, $value)
    {
        $this->statement->bindValue($param, $value);
    }

    public function execute()
    {
        return $this->statement->execute();
    }

    public function resultAll()
    {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
