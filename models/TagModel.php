<?php
require_once('../database/Database.php');

class TagModel
{
    public $conn;
    public $nom;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function setnom($nom)
    {
        $this->nom = $nom;
    }

    public function getAllTags()
    {
        $sql = "SELECT * FROM tag";
        $query = $this->conn->query($sql);
        $tags = $query->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($tags)) {
            return $tags;
        }

        return [];
    }

    public function deleteTag($tagId)
    {
        $sql = "DELETE FROM tag WHERE id_tag = :tagId";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':tagId', $tagId, PDO::PARAM_INT);
        $result = $stmt->execute();

        return $result;
    }

    public function addTag($nom)
    {
        $sql = "INSERT INTO tag (nom) VALUES (:nom)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $result = $stmt->execute();

        return $result;
    }

    public function editTag($nom, $id)
{
    $existingTag = $this->getTagById($id);

    if ($existingTag) {
        echo "Editing existing tag...";
        $update_query = "UPDATE tag SET nom = :nom WHERE id_tag = :id";
        $stmt = $this->conn->prepare($update_query);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true; 
        } else {
            echo "Failed to update tag...";
            return false;
        }
    } else {
        echo "Trying to edit a non-existing tag...";
        return false;
    }
}

public function getTagById($tagId)
    {
        $query = "SELECT * FROM tag WHERE id_tag = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $tagId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if (!empty($result)) {
            return $result;
        } else {
            return null;
        }
    }

}
