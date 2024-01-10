<?php
include('../database/Database.php');
include('../models/AuthModel.php');
include('../models/CategorieModel.php');

$conn = new Database('localhost', 'root', '', 'youwikis');
$AdminController = new CategorieModel($conn);

if (isset($_POST['id_categorie'])) {
    $categoryId = $_POST['id_categorie'];
    $result = $AdminController->deleteCategory($categoryId);
}

$results = $AdminController->getAllCategories();

class AdminController
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
}
