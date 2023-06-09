<?php

try {
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=phpvideo','root','');
}
catch (Exception $e) {
    echo $e->getMessage();
    die();
}