<?php

include('../database/Database.php');
include('../models/AuthModel.php');
include('../models/CategorieModel.php');

class categorieController
{
    private $categorieModel;

    public function __construct()
    {
        $conn = new Database('localhost', 'root', '', 'youwikis');
        $this->categorieModel = new CategorieModel($conn);
    }

    public function deleteCategory($categoryId)
    {
        $this->categorieModel->deleteCategory($categoryId);
        header("Location: ../views/categorie.php");
        exit();
    }

    public function addCategory()
    {
        $nom = $_POST['nomCategorie'];
        $this->categorieModel->addCategory($nom);
    }

    public function editCategorie()
    {
        $id = $_POST['idcategorie'];
        $nom =$_POST['nom_categorie'];
        $this->categorieModel->editCategorie($nom, $id);
    }

    public function getCategoryById($id)
    {
        return $this->categorieModel->getCategoryById($id);
    }

    public function getAllCategories()
    {
         $categories = $this->categorieModel->getAllCategories();
         return $categories;
    }

}

$categorieController = new categorieController();

?>
