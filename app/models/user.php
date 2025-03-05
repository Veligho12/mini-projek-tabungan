<?php
class User {
    private $conn;
    private $table = 'users';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Metode untuk registrasi pengguna
    public function register($name, $email, $password, $role = 'user') {
        // Hash password sebelum disimpan
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $query = "INSERT INTO " . $this->table . " (name, email, password, role) 
                  VALUES (:name, :email, :password, :role)";
        $stmt = $this->conn->prepare($query);
        
        // Binding parameter untuk mencegah SQL injection
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':role', $role);
        
        try {
            if($stmt->execute()) {
                return true;
            }
            return false;
        } catch(PDOException $e) {
            // Tambahkan error logging jika diperlukan
            error_log("Registration Error: " . $e->getMessage());
            return false;
        }
    }

    // Metode untuk login pengguna
    public function login($email, $password) {
        $query = "SELECT * FROM " . $this->table . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        
        try {
            $stmt->execute();

            if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Verifikasi password
                if(password_verify($password, $row['password'])) {
                    // Set session untuk pengguna yang berhasil login
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['user_name'] = $row['name'];
                    $_SESSION['user_role'] = $row['role'];
                    return $row;
                }
            }
            return false;
        } catch(PDOException $e) {
            // Tambahkan error logging
            error_log("Login Error: " . $e->getMessage());
            return false;
        }
    }

    // Metode untuk mendapatkan semua pengguna (biasanya untuk admin)
    public function getAllUsers() {
        $query = "SELECT id, name, email, role, created_at FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        
        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            // Error logging
            error_log("Get All Users Error: " . $e->getMessage());
            return [];
        }
    }

    // Metode untuk memeriksa apakah email sudah terdaftar
    public function emailExists($email) {
        $query = "SELECT COUNT(*) FROM " . $this->table . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        
        try {
            $stmt->execute();
            return $stmt->fetchColumn() > 0;
        } catch(PDOException $e) {
            error_log("Email Exists Check Error: " . $e->getMessage());
            return false;
        }
    }
}
?>


