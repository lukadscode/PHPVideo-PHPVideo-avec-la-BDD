<?php

ini_set('display_errors', 'on');

require_once 'bdd.php';
require_once 'Movie.php';

if(isset($_GET['id']) AND !empty($_GET['id'])) {
    $movie = new Movie($bdd);
    $movie->delete($_GET['id']);
    /*
    $id = $_GET['id'];
    $query1=$bdd->prepare("DELETE FROM movies_infos WHERE idMovie='$id'");
    $uqery1->execute();
    $query2=$bdd->prepare("DELETE FROM movies WHERE id='$id'"):
    $query2->execute();
    */
    header("Location: movie.all.php");
}

?>