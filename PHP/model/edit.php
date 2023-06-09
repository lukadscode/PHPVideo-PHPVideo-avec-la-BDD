<?php
require ('../header.php');
?>
<body class ="movie-detail">
    <main>
<section id="Movie" class="services-area services-bg col-8 mx-auto" data-background="">
<?php
require_once 'User.php'; // Inclure la classe User

// Instancier la classe User
$user = new User();

// Récupérer l'ID de l'utilisateur à partir de la requête GET
$id = $_GET['id'];

// Récupérer l'utilisateur depuis la base de données
$userData = $user->read($id);

if ($userData) {
    // Vérifier si le formulaire a été soumis pour mettre à jour un utilisateur
    if(isset($_POST['update'])) {
        $id = $_POST['id'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $user->update($id, $prenom, $email);
        header('Location: User_update.php'); // Rediriger vers la page principale
        exit; // Terminer le script pour éviter toute exécution supplémentaire
    }

    // Vérifier si le formulaire a été soumis pour supprimer un utilisateur
    if(isset($_POST['delete'])) {
        $id = $_POST['id'];
        $deletedRows = $user->delete($id);
        if ($deletedRows > 0) {
            echo "Utilisateur supprimé avec succès.";
        } else {
            echo "Aucun utilisateur trouvé avec cet ID.";
        }
        header('Location: User_update.php'); // Rediriger vers la page principale
        exit; // Terminer le script pour éviter toute exécution supplémentaire
    }

    // Afficher le formulaire d'édition de l'utilisateur
    echo "<h1 class='mb-5 mt-5 text-center'>Modifier l'utilisateur</h1>";
    echo "<form method='post'>";
    echo "<input type='hidden' name='id' value='".$userData['id']."'>";
    echo "<label class='form-label' >Prenom:</label> <input type='text' class='form-control' name='prenom' value='".$userData['prenom']."'><br>";
    echo "<label class='form-label'>Email:</label> <input type='email' class='form-control' name='email' value='".$userData['email']."'><br>";
    echo "<label class='form-label'>Role:</label> <select name='' id='' class='form-control'>
    <option  value='0'>Non admin</option>
    <option value='1'>admin</option>
</select><br>";
    echo "<input class='btn btn-danger mb-3'  type='submit' name='update' value='Enregistrer'>";
    echo "</form>";

    // Afficher le bouton de suppression
    echo "<form method='post'>";
    echo "<inputtype='hidden' name='id' value='".$userData['id']."'>";
    echo "<input  class='btn btn-danger'  type='submit' name='delete' value='Supprimer'>";
    echo "</form>";
} else {
    echo "Aucun utilisateur trouvé avec cet ID.";
}
?>

</main>
</section>
</body>
</html>
