<?php
class AuthModel
{
  public $conn;
  public $email;
  public $password;
  public $prenom;
  public $nom;
  public $isAdmin;


  public function __construct($conn) {
      $this->conn = $conn;
  }

  public function setnom($nom)
  {
    $this->nom = $nom;
  }
  public function setprenom($prenom)
  {
    $this->prenom = $prenom;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }
  
  public function setPassword($password)
  {
    $this->password = password_hash($password, PASSWORD_DEFAULT);
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function setisAdmin($isAdmin)
  {
    $this->isAdmin = $isAdmin;
  }

  public function getisAdmin()
  {
      return $this->isAdmin;
  }


  public function insertUser() {
    try {
        $insert_user_query = "INSERT INTO users (nom, prenom, email, password, isAdmin) VALUES (?, ?, ?, ?, '0')";
        
        $stmt = $this->conn->prepare($insert_user_query);

        if (!$stmt) {
            throw new Exception("Prepare statement failed: " . $this->conn->error);
        }

        $stmt->bindParam(1, $this->nom, PDO::PARAM_STR);
        $stmt->bindParam(2, $this->prenom, PDO::PARAM_STR);
        $stmt->bindParam(3, $this->email, PDO::PARAM_STR);
        $stmt->bindParam(4, $this->password, PDO::PARAM_STR);

        if (!$stmt->execute()) {
            throw new Exception("Execute failed: " . $stmt->error);
        }

    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
}



public function loginUser($password)
{
    // Récupération des données du formulaire :
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';

    $fetch_user_query = "SELECT * FROM users WHERE email = :email";
    $stmt = $this->conn->prepare($fetch_user_query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $hashedPassword = $user['password'];

        if (password_verify($password, $hashedPassword)) {
            if ($user['isAdmin'] == '1') {
                header('Location: http://localhost/youwikis/views/Categorie.php');
                exit();
            } else if ($user['isAdmin'] == '0') {
                header('Location: ../views/dashboard.php');
                exit();
            }
        } else {
            echo 'Invalid password';
        }
    } else {
        echo 'Invalid EMAIL';
    }
}


}
 ?>