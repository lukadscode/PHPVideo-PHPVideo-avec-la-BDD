<?php

ini_set('display_errors', 'on');

require_once 'bdd.php';
require_once 'Movie.php';

if(isset($_POST['id']) AND !empty($_POST['id']) AND 
isset($_POST['title']) AND !empty($_POST['title']) AND
isset($_POST['link']) AND !empty($_POST['link']) AND
isset($_POST['synopsis']) AND !empty($_POST['synopsis']) AND
isset($_POST['duration']) AND !empty($_POST['duration']) AND
isset($_POST['year']) AND !empty($_POST['year']) AND
isset($_POST['pegi']) AND !empty($_POST['pegi']))  {
    $id = $_POST['id'];
    $movie = new Movie($bdd);
    $movie->update($_GET['id']);
}

header("Location:movie.all.php");
?>