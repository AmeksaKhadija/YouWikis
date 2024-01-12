<?php

include('../database/Database.php');
include('../models/AuthModel.php');
include('../models/CategorieModel.php');
include('../models/TagModel.php');

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

    public function addEditCategory($nom, $id = null)
    {
        if ($id){
            $existingCategory = $this->categorieModel->getCategoryById($id);

            if ($existingCategory) {
                echo "Category exists. Editing...";
                $this->categorieModel->editCategorie($nom, $id);
            }
        } else {
            echo "Category doesn't exist. Adding...";
            $this->categorieModel->addCategorie($nom);
        }

        header("Location:../views/categorie.php");
        exit();
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
