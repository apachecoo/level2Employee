<?php

class EmployeeModel
{
    protected static string $table = 'employees';

    public int $id;
    public string $dni;
    public string $name;
    public string $lastName;
    public string $gender;
    public string $birthdate;
    public string $joindate;
    public float $salary;

    public static function getConnection(): PDO
    {
        return DatabaseConnection::getConnection();
    }

    public static function getAll(): array
    {
        $stmt = self::getConnection()->query('SELECT * FROM ' . self::$table);
        return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'EmployeeModel');
    }

    public static function find(int $id): EmployeeModel|bool|null
    {
        try {
            $stmt = self::getConnection()->prepare('SELECT * FROM ' . self::$table . ' WHERE id = :id');
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
        $joindate = new DateTime($this->joindate);
        $antiquity = $currentDate->diff($joindate);
        return $antiquity->y;
    }

    /**
     * @throws Exception
     */
    public function calculateBenefits(): ?float
    {
        $antiquity = $this->calculateSeniority();
        return $antiquity * (1 / 12) * $this->salary;
    }

    public function save(): bool
    {
        try {
            $stmt = self::getConnection()->prepare('INSERT INTO ' . self::$table
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
        try {
            $stmt = self::getConnection()
                ->prepare('UPDATE ' . self::$table
                    . ' SET
                    name = :name,
                    lastName = :lastName,
                    gender = :gender,
                    birthdate = :birthdate,
                    joindate = :joindate,
                    salary = :salary
                    WHERE id = :id');
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
        try {
            $stmt = self::getConnection()->prepare('DELETE FROM ' . self::$table . ' WHERE id=:id');
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
