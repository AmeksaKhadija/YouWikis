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
  $insert_user_query = "INSERT INTO users (nom, prenom, email, password,isAdmin) VALUES (?, ?, ?, ?,'0')";

  $stmt = $this->conn->prepare($insert_user_query);

  if (!$stmt) {
      die("Preparation failed: " . $this->conn->error);
  }

  $stmt->bind_param("ssss", $this->nom, $this->prenom, $this->email, $this->password);

  if (!$stmt->execute()) {
      die("Execute failed: " . $stmt->error);
  }

  $stmt->close();
}



public function loginUser($password)
{
  // Récupération des données du formulaire :
  $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $fetch_user_query = "SELECT * FROM users WHERE email = ?";
    $req = $this->conn->prepare($fetch_user_query);
    $req->bind_param("s", $email);
    $req->execute();
    $result = $req->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $hashedPassword = $user['password'];

        if (password_verify($password, $hashedPassword)) {
          if($user['isAdmin']=='1'){
            header('Location: ../views/admin/dashboard/users.php');
            exit();

          }else if($user['isAdmin']=='0'){
            header('Location: ../views/classes.php');
            exit();
          }
          
        } else {
            echo 'Invalid password';
        }
    } else {
        echo 'Invalid EMAIL';
    }

    $req->close();
}

}
 ?>