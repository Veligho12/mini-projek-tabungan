<?php
class HomeController {
    private $db;
    private $savingModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        require_once 'app/models/Saving.php';
        $this->savingModel = new Saving($this->db);
    }

    public function index() {
        require_once 'app/helpers/AuthMiddleware.php';
        AuthMiddleware::isAuthenticated();
        
        $savings = $this->savingModel->getAll();
        $isAdmin = $_SESSION['user_role'] === 'admin';
        require_once 'app/views/home.php';
    }

    public function admin() {
        require_once 'app/helpers/AuthMiddleware.php';
        AuthMiddleware::isAdmin();
        
        require_once 'app/models/user.php';
        $userModel = new User($this->db);
        $users = $userModel->getAllUsers();
        $savings = $this->savingModel->getAll();
        require_once 'app/views/admin.php';
    }
}
?>