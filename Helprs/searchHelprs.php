<?php

require_once('../controller/WikiController.php');

$wiki = new WikiController();
 $searchTerm = null;
if (isset($_POST['title']) || isset($_POST['categorie']) || isset($_POST['tag'])) {
    $searchTerm = isset($_POST['title']) ? $_POST['title'] : (isset($_POST['categorie']) ? $_POST['categorie'] : (isset($_POST['tag']) ? $_POST['tag'] : null));
    $wiki->search($searchTerm);
}

    




