<?php

include('../database/Database.php');
include('../models/AuthModel.php');
include('../models/TagModel.php');

class tagController
{
    private $tagModel;

    public function __construct()
    {
        $conn = new Database('localhost', 'root', '', 'youwikis');
        $this->tagModel = new TagModel($conn);
    }

    public function deleteTag($tagId)
    {
        $this->tagModel->deleteTag($tagId);
        header("Location:../views/tag.php");
        exit();
    }

    public function addTag()
    {
        $nom = $_POST['nomTag'];
        $this->tagModel->addTag($nom);
    }

    public function editTag()
    {
        
        $id = $_POST['idtag'];
        $nom =$_POST['nom_Tag'];
        $this->tagModel->editTag($nom, $id);
    }

    public function getAllTags()
    {
       $tags = $this->tagModel->getAllTags();
       return $tags;
    }

    public function getTagById($id)
    {
        return $this->tagModel->getTagById($id);

    }
}