<?php
include('../database/Database.php');
include('../models/UserModel.php');

$conn = new Database('localhost', 'root', '', 'youwikis');

$AuthController = new AuthController($conn);
$loginController->login();
$registerController->register();

class AuthController
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
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
            $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            $userModel = new UserModel($this->conn);
            $userModel->setprenom($prenom);
            $userModel->setnom($nom);
            $userModel->setEmail($email);
            $userModel->setPassword($password);
            $userModel->insertUser();
            header('Location: ../view/login.php');
                // header!!!!!
            }
        }

}
?>
