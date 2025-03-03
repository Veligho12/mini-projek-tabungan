<?php
class SavingController {
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
        AuthMiddleware::isAuthenticated(); # supaya lebih modular dan mudah dipakai ulang di banyak controller
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $amount = $_POST['amount'];
            $message = $_POST['message'] ?? ''; // Pesan opsional
            $user_id = $_SESSION['user_id'];
            
            if($this->savingModel->create($user_id, $amount, $message)) {
                header('Location: home');
                exit();
            }
        }
        
        require_once 'app/views/save.php';
    }
}
?>