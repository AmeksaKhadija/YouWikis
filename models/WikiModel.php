<?php
require_once('../database/Database.php');

class WikiModel
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

    public function getAllWikis()
    {
        $req = "SELECT *, categorie.nom as category_name FROM wikitag JOIN wiki ON wikitag.id_wiki=wiki.id_wiki 
        JOIN categorie ON wiki.id_categorie=categorie.id_categorie
        JOIN tag ON tag.id_tag=wikitag.id_tag" ;
        $stmt = $this->conn->query($req);
        $wikis = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($wikis)) {
            return $wikis;
        }
    }
    
    public function getAllwikisNonarchives()
    {
        $req = "SELECT *, categorie.nom as category_name FROM wikitag JOIN wiki ON wikitag.id_wiki=wiki.id_wiki 
        JOIN categorie ON wiki.id_categorie=categorie.id_categorie
        JOIN tag ON tag.id_tag=wikitag.id_tag where isAccepted=1  order by date_creation desc";
        $stmt = $this->conn->query($req);
        $wikis = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($wikis)) {
            return $wikis;
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

    public function addCategory($nom)
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



    public function insertWiki($title, $content, $category, $tags)
{
    $sql = "INSERT INTO wiki (titre, contenu, id_categorie) VALUES (:titre, :contenu, :id_categorie)";
    $res = $this->conn->prepare($sql);
    $res->bindParam(':titre', $title);
    $res->bindParam(':contenu', $content);
    $res->bindParam(':id_categorie', $category);
    $res->execute();

    if ($res) {
        $getLastId = "SELECT LAST_INSERT_ID() as last_id";
        $result = $this->conn->query($getLastId);
        $result = $result->fetch(PDO::FETCH_ASSOC);

        if ($result && isset($result['last_id'])) {
            $wikiId = $result['last_id'];

            foreach ($tags as $tagId) {
                $tagSql = "INSERT INTO wikitag (id_wiki, id_tag) VALUES (:id_wiki, :id_tag)";
                $tagStmt = $this->conn->prepare($tagSql);
                $tagStmt->bindParam('id_wiki', $wikiId);
                $tagStmt->bindParam('id_tag', $tagId);
                $tagStmt->execute();
            }
        }
    }
}

public function deleteWiki($wikiId)
{
    $req = "DELETE FROM wiki WHERE id_wiki = :id";
    $stmt = $this->conn->prepare($req);
    $stmt->bindParam(':id', $wikiId, PDO::PARAM_INT);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

public function archiveWiki($wikiId){
    $req= "UPDATE wiki SET isAccepted=0 where id_wiki=:id";
    $stmt = $this->conn->prepare($req);
    $stmt->bindParam(':id', $wikiId, PDO::PARAM_INT);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
 public function desarchiveWiki($wikiId){

    $req= "UPDATE wiki SET isAccepted=1 where id_wiki=:id";
    $stmt = $this->conn->prepare($req);
    $stmt->bindParam(':id', $wikiId, PDO::PARAM_INT);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }

 }
public function getTotalArticleArchive()
    {
        $query = "SELECT COUNT(*) as total_wikis_archives FROM wiki where  isAccepted=0";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res["total_wikis_archives"];
    }

    public function search($searchTerm)
    {
        $stmt = "SELECT *, categorie.nom as category_name FROM wikitag JOIN wiki ON wikitag.id_wiki=wiki.id_wiki 
        JOIN categorie ON wiki.id_categorie=categorie.id_categorie
        JOIN tag ON tag.id_tag=wikitag.id_tag WHERE titre LIKE  '%$searchTerm%' ";
        $result =  $this->conn->query($stmt);

        $searchResults = [];
        
        while ($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
            $searchResults[] = $row;
        }

        return $searchResults;
    }

    
}


