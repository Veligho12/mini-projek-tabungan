<?php
class Saving {
    private $conn;
    private $table = 'savings';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Metode untuk membuat/menyimpan tabungan
    public function create($user_id, $amount, $message = '') {
        $query = "INSERT INTO " . $this->table . " (user_id, amount, message) VALUES (:user_id, :amount, :message)";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':message', $message);
        
        try {
            return $stmt->execute();
        } catch(PDOException $e) {
            return false;
        }
    }

    // Metode untuk mendapatkan semua riwayat tabungan (untuk admin)
    public function getAllSavings() {
        $query = "SELECT s.*, u.name FROM " . $this->table . " s
                  JOIN users u ON s.user_id = u.id
                  ORDER BY s.created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Metode untuk mendapatkan riwayat tabungan per user
    public function getUserSavings($user_id) {
        $query = "SELECT * FROM " . $this->table . " 
                  WHERE user_id = :user_id 
                  ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Metode untuk menghitung total tabungan per user
    public function getTotalSavings($user_id) {
        $query = "SELECT SUM(amount) as total FROM " . $this->table . " 
                  WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }
}
?>