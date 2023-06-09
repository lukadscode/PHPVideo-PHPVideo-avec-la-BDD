<?php
require ('PHP/ConnexionBDD.php');
require ('PHP/header.php');
?>

<body class="login-inscription">
    <main class="Login-Form col-8 mx-auto">
    <form action="php/Form-Inscription.php" id="inscription-form" method="post">
      <h2 class="text-center">Créer ton compte pour en découvrir plus </h2>
      <div class="row">
        <div class="col-md-6">
          <label class="form-label" for="nom">Prénom :</label>
        <input class="form-control col-12" type="text" id="prenom" name="prenom" required></div>
        <div class="col-md-6">
        <label class="form-label" for="prenom">Nom :</label>
        <input class="form-control col-12" type="text" id="nom" name="nom" required>
        </div>
      </div>

        <label class="form-label" for="email">Email :</label>
        <input class="form-control col-12" type="email" id="email" name="email" required>
        <div class="row">
          <div class="col-md-6">
          <label class="form-label" for="password">Mot de passe :</label>
        <input class="form-control col-12" type="password" id="password" name="password" required>
          </div>
          <div class="col-md-6">
          <label class="form-label" for="password-confirm">Confirmer mot de passe :</label>
        <input class="form-control col-12" type="password" id="password-confirm" name="password-confirm" required>
          </div>
        </div>



        <div id="error-message"></div>
        <input class="btn btn-secondary mt-3 "  type="submit" value="S'inscrire">
      </form>
      <div class="signin-link mt-3 text-center">
        <p>Déjà un compte ? <a href="SignIn.php">Connectez-vous</a></p>
      </div>
    </main>

  <script>
let password = document.getElementById("password");
let passwordConfirm = document.getElementById("password-confirm");
let submitButton = document.getElementById("inscription-form").querySelector('input[type="submit"]');

submitButton.addEventListener("click", function (event) {
  if (password.value != passwordConfirm.value) {
    event.preventDefault();
    password.style.borderColor = "red";
    passwordConfirm.style.borderColor = "red";
    alert("Les deux mots de passe ne correspondent pas !");
  }
});

// Get the password and confirm password fields
const passwordField = document.getElementById("password");
const confirmPasswordField = document.getElementById("password-confirm");

// Get the error message element
const errorMessage = document.getElementById("error-message");

// Check if the passwords match when the form is submitted
document.getElementById("inscription-form").addEventListener("submit", (event) => {
  if (passwordField.value !== confirmPasswordField.value) {
    // Display the error message and add the error class
    errorMessage.textContent = "Les mots de passe ne correspondent pas.";
    errorMessage.classList.add("error-message");
    
    // Prevent the form submission
    event.preventDefault();
  }
});

// Get the nom field
const nomField = document.getElementById("nom");

// Add an input event listener to the nom field for validation
nomField.addEventListener("input", function(event) {
  const nomValue = nomField.value;
  
  if (!/^[a-zA-Z]*$/.test(nomValue)) {
    nomField.style.borderColor = "red";
    alert("Des caractères ne sont pas correctes dans le nom");
  } else {
    nomField.style.borderColor = "";
  }
});

const prenomField = document.getElementById("prenom");

// Add an input event listener to the nom field for validation
prenomField.addEventListener("input", function(event) {
  const prenomValue = prenomField.value;
  
  if (!/^[a-zA-Z]*$/.test(prenomValue)) {
    prenomField.style.borderColor = "red";
    alert("Des caractères ne sont pas correctes dans le prenom");
  } else {
    prenomField.style.borderColor = "";
  }
});
        </script>
    </body>
<?php require 'php/footer.php'; ?>