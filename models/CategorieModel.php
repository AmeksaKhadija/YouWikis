<?php
require_once('../database/Database.php');

class CategorieModel
{
    private $conn;
    private $nom;

    public function __construct($conn)
    {
        $this->conn = $conn->getConnection(); 
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getAllCategories()
    {
        $req = "SELECT * FROM categorie";
        $stmt = $this->conn->query($req);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($users)) {
            return $users;
        }
    }

    public function deleteCategory($categoryId)
    {
        $req = "DELETE FROM categorie WHERE id_categorie = :id";
        $stmt = $this->conn->prepare($req);
        $stmt->bindParam(':id', $categoryId, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function addCategorie($nom)
    {
        $insert_user_query = "INSERT INTO categorie (nom) VALUES (:nom)";
        $stmt = $this->conn->prepare($insert_user_query);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editCategorie($nom, $id)
    {
        $existingCategory = $this->getCategoryById($id);
    
        if ($existingCategory) {
            echo "Editing existing category...";
            $update_query = "UPDATE categorie SET nom = :nom WHERE id_categorie = :id";
            $stmt = $this->conn->prepare($update_query);
            $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                return true;
            } else {
                echo "Failed to update category...";
                return false; 
            }
        } else {
            echo "Trying to edit a non-existing category...";
            return false;
        }
    }
    
    

// ...


    public function getCategoryById($categoryId)
    {
        $query = "SELECT * FROM categorie WHERE id_categorie = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $categoryId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if (!empty($result)) {
            return $result;
        } else {
            return null;
        }
    }
    

    // ... Autres méthodes ...
}


