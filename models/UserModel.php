<?php
class UserModel
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
            header('Location: ../view/admin/dashboard/users.php');
            exit();

          }else if($user['isAdmin']=='0'){
            header('Location: ../view/classes.php');
            exit();

          }else{
            header('Location: ../view/index.php');
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


public function getAllUsers(){
  $users=array();
  $req="SELECT * from utilisateur where role_name!='admin'";
  $query=$this->conn->query($req);
  while($array=$query->fetch_assoc()) {
      $users[]=$array;
}
return $users;

}

public function updateUser($userId)
{
    if (empty($userId)) {
        die("User ID is required for update.");
    }

    $update_user_query = "UPDATE utilisateur 
                          SET lastname=?, firstname=?, email=?, phone=?, CIN=?, birthdate=?, role_name=? 
                          WHERE id_user=?";

    $stmt = $this->conn->prepare($update_user_query);

    if (!$stmt) {
        die("Preparation failed: " . $this->conn->error);
    }

    $stmt->bind_param(
        "sssssssi",
        $this->lastname,
        $this->firstname,
        $this->email,
        $this->phone,
        $this->CIN,
        $this->birthdate,
        $this->role_name,
        $userId
    );

    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }

    $stmt->close();
}


public function getUserById($idModifier)
{
    $req = "SELECT * FROM utilisateur WHERE id_user = ?";
    $stmt = $this->conn->prepare($req);
    $stmt->bind_param("i", $idModifier);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $userDetail = $result->fetch_assoc();

        $this->setFirstname($userDetail['firstname']);
        $this->setLastname($userDetail['lastname']);
        $this->setEmail($userDetail['email']);
        $this->setPhone($userDetail['phone']);
        $this->setCIN($userDetail['CIN']);
        $this->getRoleName($userDetail['role_name']);
        $this->setBirthdate($userDetail['birthdate']);

        return $userDetail;
    }

    return null;
}



}
?>