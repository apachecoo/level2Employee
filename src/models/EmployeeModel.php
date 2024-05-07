<?php

class EmployeeModel
{
    protected static string $table = 'employees';
    protected static PDO $pdo;

    public $id;
    public $dni;
    public $name;
    public $lastName;
    public $gender;
    public $birthdate;
    public $joindate;
    public $salary;


    public static function initialize(): void
    {
        self::$pdo = new PDO('mysql:host=mariadb;port=3306;dbname=level2_employees', 'user', '12345');
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getAll(): array
    {
        self::initialize();
        $stmt = self::$pdo->query('SELECT * FROM ' . self::$table);
        return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'EmployeeModel');
    }


    public static function find(int $id): EmployeeModel|bool|null
    {
        self::initialize();
        try {
            $stmt = self::$pdo->prepare('SELECT * FROM ' . self::$table . ' WHERE id = :id');
            $stmt->execute(array(':id' => $id));
            if ($stmt->rowCount() === 0) {
                return null;
            }
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'EmployeeModel');
            return $stmt->fetch() ?: null;
        } catch (PDOException $e) {
            echo "Error al ejecutar la consulta: " . $e->getMessage();
            return false;
        }
    }

    public function calculateAge(): ?int
    {
        if ($this->birthdate === null) {
            return null;
        }
        $dob = new DateTime($this->birthdate);
        $now = new DateTime();
        $age = $now->diff($dob);

        return $age->y;
    }


}
