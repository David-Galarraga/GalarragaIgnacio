<?php
class Database {
    private static $host = "localhost";
    private static $db = "vapourware";
    private static $user = "root";
    private static $pass = "admin";
    private static $charset = "utf8mb4";
    public static function connect() {
        try {
            $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$db . ";charset=" . self::$charset ;
            $pdo = new PDO($dsn, self::$user , self::$pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Error en la conexión: " . $e->getMessage());
        }
    }
}