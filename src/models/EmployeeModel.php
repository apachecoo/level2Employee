<?php

class EmployeeModel
{
    protected static $pdo;

    public static function initialize()
    {
        self::$pdo = new PDO('mysql:host=mariadb;port=3306;dbname=level2_employees', 'user', '12345');
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getAll()
    {
        self::initialize();
        $stmt = self::$pdo->query('SELECT * FROM employees');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find(int $id)
    {
        self::initialize();
        $stmt = self::$pdo->prepare('SELECT * FROM employees WHERE id = :id');
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
