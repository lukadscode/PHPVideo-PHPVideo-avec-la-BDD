<?php
require ('PHP/ConnexionBDD.php');
require ('PHP/header.php');
?>
<body>
    <main>
    <section class="banner-area-SignIn banner-bg-SignIn">
        <form class="Form" action="php/login.php" d="login-form" method="post">
          <h2 class="text-center mt-3">Connecte toi pour en découvrir plus</h2>
          <label class="form-label" for="email">Email : </label>
          <input class="form-control col-4" type="email" id="email" name="username" required>
          <label for="password">Mot de passe :</label>
          <input class="form-control col-4" type="password" id="password" name="password" required>
          <input class="btn btn-primary m-5" type="submit" value="Se connecter">
          <div class="signup-link">
            <p>Pas encore de compte ? <a href="inscription.php">Inscrivez-vous</a>.</p>
          </div>
        </form>
    </section>
  </main>
    <?php
    require ("php/footer.php"); 
    ?>

