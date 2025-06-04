<?php

class ConexionBD {
    private $host = 'localhost';
    
    // Descomentar esto si se esta en local (xampp)
    // private $db = 'unidsalud-dallana';
    // private $user = 'root';
    // private $pass = '';

    // Estas son las credenciales de la BD
    private $db = 'laborato_paginawp';
    private $user = 'laborato_rootwp';
    private $pass = 'HLHQyTRUpX7BU1iMZFfz';
    
    private $charset = 'utf8mb4';
    private $pdo;

    public function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            die('Error de conexión: ' . $e->getMessage());
        }
    }

    public function getConexion() {
        return $this->pdo;
    }
}
