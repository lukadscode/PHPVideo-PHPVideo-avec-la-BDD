<?php

ini_set('display_errors', 'on');

require ('../ConnexionBDD.php');

$select = $pdo->prepare("SELECT * FROM gender");
$select->execute();
$genders = $select->fetchAll(PDO::FETCH_ASSOC);

require ('../header.php');
?>

<body class="movie-detail">
    <main>
<section id="Movie" class="services-area services-bg col-8 mx-auto" >
    <h1 class="my-5">Ajouter un film</h1>
    <a href="movie.all.php">Retour</a>
    <form action="insertmovie.controller.php" method="post" enctype="multipart/form-data">
        <label class="form-label" for="title">Titre</label><br>
        <input class="form-control " type="text" name="title" id="title"><br><br>
        <label class="form-label" for="image">Affiche</label><br>
        <input class="form-control " type="file" name="image[]" id="image[]"><br><br>
        <label class="form-label" for="Lien">Lien</label><br>
        <input class="form-control " type="text" name="link" id="link"><br><br>
        <label class="form-label" for="synopsis">Synopsis</label><br>
        <input class="form-control " type="text" name="synopsis" id="synopsis"><br><br>
        <label class="form-label" for="duration">Durée</label><br>
        <input class="form-control " type="number" name="duration" id="duration"><br><br>
        <label class="form-label" for="releaseyear">Année de sortie</label><br>
        <input class="form-control " type="number" name="releaseyear" id="releaseyear"><br><br>
        <label class="form-label" for="pegi">PEGI</label><br>
        <input class="form-control " type="number" name="pegi" id="pegi"><br><br>
        <input class="btn btn-primary" type="submit" value="Ajouter ce film">
    </form>
</body>
</html>