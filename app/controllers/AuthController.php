<?php
class AuthController {
    private $db;
    private $userModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection(); // Gunakan getConnection() dari class Database
        require_once 'app/models/User.php';
        $this->userModel = new User($this->db);
    }

    public function login() {
        require_once 'app/helpers/AuthMiddleware.php';
        AuthMiddleware::isGuest();

        $error = ''; // Tambahkan variabel error untuk pesan kesalahan

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];

            try {
                if($this->userModel->login($email, $password)) {
                    header('Location: home');
                    exit();
                } else {
                    $error = 'Email atau password salah';
                }
            } catch (Exception $e) {
                $error = 'Terjadi kesalahan saat login';
            }
        }

        require_once 'app/views/login.php';
    }


    public function register() {
        require_once 'app/helpers/AuthMiddleware.php';
        AuthMiddleware::isGuest();

        $error = ''; // Tambahkan variabel error untuk pesan kesalahan

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];

            // First user will be admin, rest will be regular users
            $role = $this->isFirstUser() ? 'admin' : 'user';

            try {
                if($this->userModel->register($name, $email, $password, $role)) {
                    header('Location: login');
                    exit();
                } else {
                    $error = 'Registrasi gagal. Silakan coba lagi.';
                }
            } catch (Exception $e) {
                $error = 'Terjadi kesalahan saat registrasi';
            }
        }

        require_once 'app/views/register.php';
    }


    private function isFirstUser() {
        $query = "SELECT COUNT(*) as count FROM users";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] === '0';
    }

    public function logout() {
        session_destroy();
        header('Location: login');
        exit();
    }
}


