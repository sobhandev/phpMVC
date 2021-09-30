<?php

class database extends PDO
{
    private static PDO $instance;

    public function __construct()
    {
        parent::__construct("mysql:host=" . host . ";dbname=" . database, user, password, []);
        self::$instance = $this;
    }

    public static function getInstance(): PDO|database|null
    {
        if (self::$instance == null) { // اگر شی قبلی از دیتابیس وجود نداشت
            return null;
        }

        return self::$instance;
    }

    public static function getRowCount(PDOStatement $stmt): int
    {
        return $stmt->rowCount();
    }

    public function doQuery(string $query, array $arguments = []): bool|PDOStatement
    {
        $statement = self::$instance->prepare($query);
        $statement->execute($arguments);
        return $statement;
    }
    public function parseQuery(PDOStatement $statement , bool $fetchAll = true, bool $objective = false){
        return $fetchAll ? $statement->fetchAll($objective ? PDO::FETCH_OBJ : PDO::FETCH_ASSOC) : $statement->fetch($objective ? PDO::FETCH_OBJ : PDO::FETCH_ASSOC);
    }
}