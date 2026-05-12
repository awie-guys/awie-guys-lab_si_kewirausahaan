<?php

class Model
{
    protected PDO $db;

    private static ?PDO $connection = null;

    public function __construct()
    {
        $this->db = self::connect();
    }

    private static function connect(): PDO
    {
        if (self::$connection instanceof PDO) {
            return self::$connection;
        }

        $configFile = dirname(__DIR__) . '/config/database.php';
        if (!file_exists($configFile)) {
            throw new Exception('File config database tidak ditemukan.');
        }

        $config = require $configFile;

        $driver = $config['driver'] ?? 'mysql';
        $host = $config['host'] ?? 'localhost';
        $database = $config['database'] ?? '';
        $charset = $config['charset'] ?? 'utf8mb4';
        $username = $config['username'] ?? 'root';
        $password = $config['password'] ?? '';

        $dsn = "{$driver}:host={$host};dbname={$database};charset={$charset}";

        self::$connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);

        return self::$connection;
    }

    protected function query(string $sql, array $params = []): PDOStatement
    {
        $statement = $this->db->prepare($sql);
        $statement->execute($params);

        return $statement;
    }

    protected function all(string $sql, array $params = []): array
    {
        return $this->query($sql, $params)->fetchAll();
    }

    protected function first(string $sql, array $params = []): array|false
    {
        return $this->query($sql, $params)->fetch();
    }
}