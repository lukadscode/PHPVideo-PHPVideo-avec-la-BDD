<?php
require_once("ConnexionBDD.php");



    $req = $pdo->prepare('SELECT * FROM users WHERE email = :username');
    $req->execute(['username' => $_POST['username']]);
    $user = $req->fetch();
    var_dump($user);
    if($user == null){
        
      session_start();
       echo 'Identifiant inconnu';
    }elseif(password_verify($_POST['password'], $user->password)){
        
        session_start();
        $_SESSION['auth'] = $user;
        echo 'Connecté';
        header('Location: /index.php');
        exit();
    }else{
        session_start();
        echo 'Identifiant ou mot de passe incorrecte';
    }



?>
