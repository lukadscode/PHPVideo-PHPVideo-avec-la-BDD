
<?php
require ('../header.php');
require_once ('User.php'); // Inclure la classe User
?>
<body class="movie-detail Form-Profil">
    <main>
<section id="Movie" class="services-area services-bg col-8 mx-auto" data-background="">
    <table> 
        <tbody>
<?php
// Instancier la classe User
$user = new User();

// Récupérer la liste des utilisateurs depuis la base de données
$users = $user->all();

?>
<a href="../movie/movie.all.php"><button class="btn btn-primary">Gestion des films</button></a>

<h1 class="mb-5 mt-5">Liste des utlisateurs</h1>
    <table class="table">
        <thead>
            <tr>
                <th class="text-white">Id</th>
                <th class="text-white">Prenom</th>
                <th class="text-white">Email</th>
                <th class="text-white">Action</th>
            </tr>
        </thead>
        <tbody class="text-white">
            <?php  foreach($users as $user) : ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['prenom'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><a href='edit.php?id=<?= $user['id'] ?>'>Modifier</a></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    </main>
</section>
<script src="https://appstack.bootlab.io/js/app.js"></script>
</body>
</html>