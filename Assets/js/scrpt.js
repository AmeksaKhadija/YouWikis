function validateFormWithRegex() {
  var prenom = document.getElementsByName("prenom")[0].value;
  var nom = document.getElementsByName("nom")[0].value;
  var email = document.getElementsByName("email")[0].value;
  var password = document.getElementsByName("password")[0].value;
  var terms = document.getElementsByName("terms")[0].checked; 

  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  var passwordRegex = /.+/;

  if (prenom === "" || nom === "" || !emailRegex.test(email) || !passwordRegex.test(password) || !terms) {
    alert("Veuillez remplir tous les champs correctement et accepter les conditions.");
    return false;
  }

  return true;
}

