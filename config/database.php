<?php
class Database {
    private $host = 'localhost';
    private $database = 'tabungan_db';
    private $username = 'root'; 
    private $password = ''; 
    private $conn;

    public function getConnection() {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name}",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch(PDOException $e) {
            die("Connection Error: " . $e->getMessage());
        }
    }
}
?>