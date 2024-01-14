<?php

require_once('../controller/tagController.php');

$tag = new tagController();

if(isset($_GET['tag_id'])){
    $tagId = $_GET['tag_id'];
    $tag->deleteTag($tagId);
}

if(isset($_POST['nomTag'])){
    $tag->addTag();
    header("Location: {$_SERVER['HTTP_REFERER']}");
}

if(isset($_POST['nom_Tag'])){
    
    $tag->editTag();
    header("Location: http://localhost/youwikis/views/Tag.php");

}