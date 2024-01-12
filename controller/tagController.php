<?php

include('../database/Database.php');
include('../models/AuthModel.php');
include('../models/CategorieModel.php');
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

    public function addEditTag($nom, $id = null)
    {
        if ($id) {
            $existingTag = $this->tagModel->getTagById($id);

            if ($existingTag) {
                echo "Tag exists. Editing...";
                $this->tagModel->editTag($nom, $id);
            }
        } else {
            echo "Tag doesn't exist. Adding...";
            $this->tagModel->addTag($nom);
        }

        header("Location:../views/tag.php");
        exit();
    }

    public function getAllTags()
    {
       $tags = $this->tagModel->getAllTags();
       return $tags;
    }
}