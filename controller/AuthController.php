<?php
include('../database/Database.php');
include('../models/AuthModel.php');

$conn = new Database('localhost', 'root', '', 'youwikis');

$AuthController = new AuthController($conn);
$AuthController->register();


class AuthController
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

            $AuthModel = new AuthModel($this->conn);
            $AuthModel->setprenom($prenom);
            $AuthModel->setnom($nom);
            $AuthModel->setEmail($email);
            $AuthModel->setPassword($password);
            $AuthModel->insertUser();
            header('Location: ../views/login.php');
            }
    }

}
?>
