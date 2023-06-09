
<?php

ini_set('display_errors', 'on');

require ('../ConnexionBDD.php');

$query = $pdo->prepare("SELECT mo.id, mo.title, mo.image, mo.link, mi.synopsis, mo.duration, mo.year, mi.pegi FROM movies AS mo LEFT JOIN movies_infos AS mi ON mi.idmovie = mo.id");
$query->execute();
$movies = $query->fetchAll();





require ('../header.php');

?>


<body class="movie-detail Form-Profil">
    <main>
<section id="Movie" class="services-area services-bg col-8 mx-auto" >
<a href="movie.insert.php"><button class="btn btn-primary">Ajouter un film</button></a>
<h2 class="text-center my5">Gestion des films</h2>



<table class="table text-white">
    <thead></thead>
    <tr>
        <th id="ttitle" colspan=1>Titre</th>
        <th id="tlink" colspan=1>Lien lecteur</th>
        <th id="tcontenu" colspan=1>Contenu</th>
        <th id="treleaseyear" colspan=1>Année de sortie</th>
        <th id="tduration" colspan=1>Durée</th>
        <th id="tpegi" colspan=1>PEGI</th>
        <th colspan="2">Action</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($movies as $key) : ?>
            <tr>
                <td><?= $key->title ?></td>
                <td><?php echo substr($key->link, 0, 30); ?></td>
                <td><?= substr($key->synopsis, 0, 80) ?></td>
                <td><?= $key->year ?></td>
                <td><?= $key->duration ?></td>
                <td><?= $key->pegi ?></td>
                <td><a href="movie.update.php?id=<?= $key->id ?>">Modif</a></td>
                <td><a href="movie.delete.php?id=<?= $key->id ?>">Suppr</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

</body>
</html>
