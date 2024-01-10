<?php

class CategorieModel
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


    public function getAllCategories()
    {
        $req="SELECT * from categorie";
        $query=$this->conn->query($req);
        while($array=$query->fetch_assoc()) {
            $users[]=$array;
        }
        if(!empty($users)){
            return $users;
        }
       
    }

    public function deleteCategory($categoryId)
    {
        $req = "DELETE FROM categorie WHERE id_categorie = $categoryId";
        $query = $this->conn->query($req);

        if ($query) {
            return true; 
        } else {
            return false; 
        }
    }

        
        
}