<?php
include('../database/Database.php');
include('../models/UserModel.php');

$conn = new Database('localhost', 'root', '', 'youwikis');

$loginController = new LoginController($conn);
$loginController->login();

class LoginController
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';

            $userModel = new UserModel($this->conn);
            $userModel->setEmail($email);
            $userModel->loginUser($password);
        } 
    }
}
?>
