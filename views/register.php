<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration or Sign Up form in HTML CSS | CodingLab</title>
  <link rel="stylesheet" href="../assets/styles/registerstyle.css">
</head>

<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <form onsubmit="return validateFormWithRegex()" method="POST" action="http://localhost/youwikis/controller/AuthController.php">
      <div class="input-box">
        <input type="text" name="prenom" placeholder="Entrer votre prenom">
      </div>
      <div class="input-box">
        <input type="text" name="nom" placeholder="Entrer votre nom">
      </div>
      <div class="input-box">
        <input type="text" name="email" placeholder="Entrer votre email">
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Entrer votre password">
      </div>
      <div class="policy">
        <input type="checkbox" name="terms" required>
        <h3>I accept all terms & condition</h3>
      </div>
      <div class="input-box button">
        <input type="submit" value="Register Now">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="login.php">Login now</a></h3>
      </div>
    </form>
  </div>

  <script src="../Assets/js/scrpt.js"></script>
</body>

</html>
