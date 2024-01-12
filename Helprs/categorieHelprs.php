<?php

require_once('../controller/categorieController.php');

$categorie = new categorieController();

if(isset($_GET['id'])){
    $categoryId = $_GET['id'];
    $categorie->deleteCategory($categoryId);
}
