<?php

class DatabaseConnection
{
    private string $host;
    private string $port;
    private string $dbName;
    private string $user;
    private string $password;
    private static ?PDO $pdo = null;

    public function __construct()
    {
        $this->loadPhpEnvironmentVariables();
        $this->host = getenv('DB_HOST');
        $this->port = getenv('DB_PORT');
        $this->dbName = getenv('DB_NAME');
        $this->user = getenv('DB_USER');
        $this->password = getenv('DB_PASSWORD');
    }

    public static function getConnection(): PDO
    {
        if (self::$pdo === null) {
            $db = new self();
            $dni = 'mysql:host=' . $db->host .
                ';port=' . $db->port .
                ';dbname=' . $db->dbName;
            self::$pdo = new PDO($dni, $db->user, $db->password);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$pdo;
    }

    private function loadPhpEnvironmentVariables(): void
    {
        $envFile = __DIR__ . '/../.env';
        if (file_exists($envFile)) {
            $env = parse_ini_file($envFile);
            foreach ($env as $key => $value) {
                putenv("$key=$value");
            }
        } else {
            exit('No existe el archivo de configuración .env');
        }
    }
}