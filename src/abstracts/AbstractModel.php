<?php

abstract class AbstractModel
{
    protected static string $table;

    /**
     * @return array
     */
    public static function getAll(): array
    {
        return self::query('SELECT * FROM ' . static::$table);
    }

    /**
     * @param string $sql
     * @param array $params
     * @return array|null
     */
    protected static function query(string $sql, array $params = []): ?array
    {
        try {
            $className = get_called_class(); // Obtener el nombre de la clase hija
            $stmt = self::getConnection()->prepare($sql);
            $stmt->execute($params);

            return $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $className);
        } catch (PDOException $e) {
            echo "Error al ejecutar la consulta: " . $e->getMessage();
            return null;
        }
    }

    /**
     * @return PDO
     */
    protected static function getConnection(): PDO
    {
        return DatabaseConnection::getConnection();
    }

    /**
     * @param int $id
     * @return bool|self|null
     */
    public static function find(int $id): self|bool|null
    {
        try {
            $sql = 'SELECT * FROM ' . static::$table . ' WHERE id = :id';
            $className = get_called_class();
            $stmt = self::getConnection()->prepare($sql);
            $stmt->execute([':id' => $id]);
            if ($stmt->rowCount() === 0) {
                return null;
            }
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $className);
            return $stmt->fetch() ?: null;
        } catch (PDOException $e) {
            echo "Error al ejecutar la consulta: " . $e->getMessage();
            return null;
        }
    }

    /**
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */
    protected static function executeQuery(string $query, array $params = []): PDOStatement
    {
        $stmt = self::getConnection()->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }

    /**
     * @param int $id
     * @return bool
     */
    public static function delete(int $id): bool
    {
        try {
            $stmt = self::getConnection()->prepare('DELETE FROM ' . static::$table . ' WHERE id=:id');
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