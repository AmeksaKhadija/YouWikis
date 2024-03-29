<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="../assets/styles/loginstyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>
<body>
  <div class="container">
    <div class="wrapper">
      <div class="title"><span>Bienvenu autre fois</span></div>
      <h1></h1>
      <form action="../Controller/LoginController.php" method="POST"> 
        <div class="row">
          <i class="fas fa-user"></i>
          <input type="text" name="email" placeholder="email" required>
        </div>
        <div class="row">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="pass"><a href="#">Forgot password?</a></div>
        <div class="row button">
          <input type="submit" value="Login">
        </div>
        <span style="color:red;"></span>
        <div class="signup-link">Not a member? <a href="register.php">Signup now</a></div>
      </form>
    </div>
  </div>
</body>
</html>