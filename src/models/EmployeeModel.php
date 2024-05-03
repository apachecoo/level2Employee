<?php

class EmployeeModel
{
    protected static PDO $pdo;

    public static function initialize(): void
    {
        self::$pdo = new PDO('mysql:host=mariadb;port=3306;dbname=level2_employees', 'user', '12345');
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getAll(): false|array
    {
        self::initialize();
        $stmt = self::$pdo->query(query: 'SELECT * FROM employees');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find(int $id): false|array
    {
        self::initialize();
        $stmt = self::$pdo->prepare('SELECT * FROM employees WHERE id = :id');
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
