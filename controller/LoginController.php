<?php
include('../database/Database.php');
include('../models/AuthModel.php');

$conn = new Database('localhost', 'root', '', 'youwikis');

$AuthController = new LoginController($conn);
$AuthController->login();

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

            $AuthModel = new AuthModel($this->conn);
            $AuthModel->setEmail($email);
            $AuthModel->loginUser($password);
        }
    }


}
?>
