<?php
// Connexion à la base de données
$host = '127.0.0.1';
$dbname = 'phpvideo';
$user = 'root';
$password = '';

try {
    $pdo = new PDO('mysql:dbname=phpvideo;host=127.0.0.1', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données: " . $e->getMessage();
}
?>