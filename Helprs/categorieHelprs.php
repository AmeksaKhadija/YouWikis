<?php

require_once('../controller/categorieController.php');

$categorie = new categorieController();

if(isset($_GET['id'])){
    $categoryId = $_GET['id'];
    $categorie->deleteCategory($categoryId);
    header("Location: {$_SERVER['HTTP_REFERER']}");

}

if(isset($_POST['nomCategorie'])){
    $categorie->addCategory();
    header("Location: {$_SERVER['HTTP_REFERER']}");

}