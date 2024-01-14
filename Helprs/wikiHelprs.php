<?php
require_once('../controller/WikiController.php');

$wiki = new WikiController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $category = htmlspecialchars($_POST['category_id']);
    $tags = isset($_POST['tags']) ? $_POST['tags'] : array(); 
    $wiki->insertWiki($title, $content, $category, $tags);

}

if(isset($_GET['idwiki'])){
    $wikiId = $_GET['idwiki'];
    $wiki->deleteWiki($wikiId);
}
