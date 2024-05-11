<?php

class EmployeeModel
{
    protected static string $table = 'employees';
    protected static PDO $pdo;

    public int $id;
    public string $dni;
    public string $name;
    public string $lastName;
    public string $gender;
    public string $birthdate;
    public string $joindate;
    public int $salary;


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

    /**
     * @throws Exception
     */
    public function calculateAge(): ?int
    {
        $currentDate = new DateTime();
        $birthDate = new DateTime($this->birthdate);
        $age = $currentDate->diff($birthDate);

        return $age->y;
    }

    /**
     * @throws Exception
     */
    public function calculateSeniority(): ?int
    {
        $currentDate = new DateTime();
        $joinDate = new DateTime($this->joindate);
        $antiquity = $currentDate->diff($joinDate);
        return $antiquity->y;
    }

    /**
     * @throws Exception
     */
    public function calculateBenefits(): ? float
    {
        $antiquity = $this->calculateSeniority();
        return $antiquity * (1 / 12) * $this->salary;
    }

    public function save(): bool
    {
        self::initialize();
        try {
            $stmt = self::$pdo->prepare('INSERT INTO ' . self::$table
                . ' (dni, name, lastName, gender, birthdate, joindate, salary)' .
                ' VALUES (:dni, :name, :lastName, :gender, :birthdate, :joindate, :salary)');
            $stmt->execute([
                ':dni' => $this->dni,
                ':name' => $this->name,
                ':lastName' => $this->lastName,
                ':gender' => $this->gender,
                ':birthdate' => $this->birthdate,
                ':joindate' => $this->joindate,
                ':salary' => $this->salary
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Error al guardar el registro" . $e->getMessage();
            return false;
        }
    }

    public function update(int $id): bool
    {
        self::initialize();
        try {
            $stmt = self::$pdo->prepare('UPDATE ' . self::$table . ' SET name = :name, lastName = :lastName, gender = :gender, birthdate = :birthdate, joindate = :joindate, salary = :salary WHERE id = :id');
            $stmt->execute(array(
                ':name' => $this->name,
                ':lastName' => $this->lastName,
                ':gender' => $this->gender,
                ':birthdate' => $this->birthdate,
                ':joindate' => $this->joindate,
                ':salary' => $this->salary,
                ':id' => $id
            ));
            return true;
        } catch (PDOException $e) {
            echo "Error al actualizar el empleado: " . $e->getMessage();
            return false;
        }
    }

    public function delete(int $id): bool
    {
        self::initialize();
        try {
            $stmt = self::$pdo->prepare('DELETE FROM ' . self::$table . ' WHERE id=:id');
            $stmt->execute([
                ':id' => $id
            ]);
            return true;
        } catch (PDOException $e) {
            echo 'Error al eliminar registro' . $e->getMessage();
            return false;
        }
    }

}
