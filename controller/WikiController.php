<?php

include('../database/Database.php');
include('../models/AuthModel.php');
include('../models/WikiModel.php');
include('../models/CategorieModel.php');
include('../models/TagModel.php');

class WikiController
{
    private $wikiModel;
    private $categorieModel;
    private $tagModel;

    public function __construct()
    {
        $conn = new Database('localhost', 'root', '', 'youwikis');
        $this->wikiModel = new WikiModel($conn);
        $this->categorieModel=new CategorieModel($conn);
        $this->tagModel=new TagModel($conn);

    }


    public function getAllwikis()
    {
         $wikis = $this->wikiModel->getAllwikis();
         return $wikis;
    }

    public function getAllwikisNonarchives()
    {
         $wikis = $this->wikiModel->getAllwikisNonarchives();
         return $wikis;
    }

    public function getAllCategories()
    {
         $categories=$this->categorieModel->getAllCategories();
         return $categories;
    }

    public function getAllTags()
    {
       $tags = $this->tagModel->getAllTags();
       return $tags;
    }




    public function insertWiki($title, $content, $category, $tags) {
        $wiki = $this->wikiModel;
        $wiki->insertWiki($title, $content, $category, $tags);
        header("Location: ../views/dashboard.php");
        exit();
    }

    public function deleteWiki($wikiId){
        $wiki = $this->wikiModel;
        $wiki->deleteWiki($wikiId);
        header("Location: ../views/dashboard.php");
        exit();

    }

    public  function archiveWiki($wikiId){
        $wiki = $this->wikiModel;
        $wiki->archiveWiki($wikiId);
        header("Location: ../views/archive.php");
        exit();
    }

    public function desarchiveWiki($wikiId){
        $wiki = $this->wikiModel;
        $wiki->desarchiveWiki($wikiId);
        header("Location: ../views/archive.php");
        exit();
    }
    public function getTotalCategories()
    {
        $totalcategories = $this->categorieModel->getTotalCategories();
        return $totalcategories;
    }
    
    public function getTotalTag()
    {
        $tags = $this->tagModel->getTotalTag();
        return $tags;
    }
    
    public function getTotalArticleArchive()
    {
        $totalwikiarchives = $this->wikiModel->getTotalArticleArchive();
        return $totalwikiarchives;
    }
    


   
    
    

}

$wikiController = new WikiController();

?>
