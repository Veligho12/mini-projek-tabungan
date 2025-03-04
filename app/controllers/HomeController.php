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
        
        $userId = $_SESSION['user_id'];
        $savings = $this->savingModel->getUserSavings($userId);
        $totalSavings = $this->savingModel->getTotalSavings($userId);
        
        require_once 'app/views/home.php';
    }

    public function admin() {
        require_once 'app/helpers/AuthMiddleware.php';
        AuthMiddleware::isAdmin();
        
        $allSavings = $this->savingModel->getAllSavings();
        require_once 'app/views/admin.php';
    }
}
?>