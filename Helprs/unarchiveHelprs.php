<?php

require_once('../controller/WikiController.php');

$wiki = new WikiController();
if(isset($_GET['idwiki'])){
    $wikiId = $_GET['idwiki'];
    $wiki->desarchiveWiki($wikiId);
}