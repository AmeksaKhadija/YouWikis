<?php

require_once('../controller/tagController.php');

$tag = new tagController();

if(isset($_GET['tag_id'])){
    $tagId = $_GET['tag_id'];
    $tag->deleteTag($tagId);
}