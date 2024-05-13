<?php

class EmployeeModel extends AbstractModel implements InterfazModel
{
    use TraitTools;
    public static string $table = 'employees';
    public int $id;
    public string $dni;
    public string $name;
    public string $lastName;
    public string $gender;
    public string $birthdate;
    public string $joindate;
    public float $salary;

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
     * @return string
     * @throws Exception
     */
    public function calculateBenefits(): string
    {
        $antiquity = $this->calculateSeniority();
        $benefits= $antiquity * (1 / 12) * $this->salary;

        return $this->formatDecimal($benefits,2);
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
}
