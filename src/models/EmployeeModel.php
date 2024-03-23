<?php

class EmployeeModel
{
    protected $pdo;

    public function __construct()
    {
//        $this->pdo = new PDO('mysql:host=127.0.0.16;port=33066;dbname=level2_employees_db', 'user', '12345');
    }

    public static function getAll()
    {
        $pdo = new PDO('mysql:host=level2_employees_mariadb;port=36066;dbname=level2_employees_db', 'user', '12345');
        $stmt = $pdo->query('SELECT * FROM employees');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find(int $id)
    {
        $pdo = new PDO('mysql:host=localhost;dbname=level2_employees', 'user', '12345');
        $stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

