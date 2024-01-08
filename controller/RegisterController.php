<?php
require_once('../database/Database.php');
require_once('../models/UserModel.php');

class RegisterController
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
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

$conn = new Database('localhost', 'root', '', 'youwikis');

$registerController = new RegisterController($conn);
$registerController->register();
?>
