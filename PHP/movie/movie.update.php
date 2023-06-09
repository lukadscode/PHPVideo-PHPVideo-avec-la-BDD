<?php

require_once 'Movie.php';

ini_set('display_errors', 'on');

if(isset($_GET['id']) AND !empty($_GET['id'])) {
    $getid = htmlspecialchars($_GET['id']);

    $movie = new Movie ($bdd);

    if ($movie->load($getid) != NULL) {
        $onemovie = $movie->load($getid);
        $id_movie = $onemovie['id'];
        $title = $onemovie['title'];
        $image = $onemovie['image'];
        $link = $onemovie['link'];
        $synopsis = $onemovie['synopsis'];
        $releaseyear = $onemovie['year'];
        $duration = $onemovie['duration'];
        $pegi = $onemovie['pegi'];    
    } else {
        die('Ce film n\'existe pas !');
    }
} else {
    die('Erreur');
}

require ('../header.php');
?>

<body class="movie-detail">
    <main>
<section id="Movie" class="services-area services-bg col-8 mx-auto" >
    <a href="movie.all.php">Retour</a>
    <form action="updatemovie.controller.php?id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">
        <input class="form-control" type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <label class="form-label" for="title">Titre</label><br>
        <input class="form-control" type="text" name="title" value="<?= $title ?>" id="title"><br><br>
        <label class="form-label" for="image">Affiche</label><br>
        <img src="images/<?= $image ?>" alt="img"><br>
        <input class="form-control" type="file" name="image[]" value id="image[]"><br><br>
        <label class="form-label" for="Lien">Titre</label><br>
        <input class="form-control" type="text" name="link" value="<?= $link ?>" id="link"><br><br>
        <label class="form-label" for="synopsis">Synopsis</label><br>
        <input class="form-control" type="text" name="synopsis" value="<?= $synopsis ?>" id="synopsis"><br><br>
        <label class="form-label" for="duration">Durée</label><br>
        <input class="form-control" type="number" name="duration" value="<?= $duration ?>" id="duration"><br><br>
        <label class="form-label" for="year">Année de sortie</label><br>
        <input class="form-control" type="number" name="year" value="<?= $year ?>" id="year"><br><br>
        <label class="form-label" for="pegi">PEGI</label><br>
        <input class="form-control" type="number" name="pegi" value="<?= $pegi ?>" id="pegi"><br><br>
        <input class="form-control" type="submit" value="Modifier ce film">
    </form>
</body>
</html>