<?php
require ('PHP/ConnexionBDD.php');
require ('PHP/header.php');
?>
<body class="Form-Profil">
<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Valider les données du formulaire
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Paramètres de l'e-mail
        $to = 'simon.delcloque@gmail.com'; // Remplacez par votre adresse e-mail
        $subject = 'Nouveau message de contact';
        $body = "Nom: $name\nEmail: $email\nMessage: $message";

        // En-têtes de l'e-mail
        $headers = "From: $name <$email>";

        // Envoyer l'e-mail
        if (mail($to, $subject, $body, $headers)) {
            echo 'Message envoyé avec succès.';
        } else {
            echo 'Une erreur s\'est produite lors de l\'envoi du message.';
        }
    } else {
        echo 'Veuillez remplir tous les champs du formulaire.';
    }
}
?>
    <h1>Contactez-nous</h1>
    <form method="post" action="">
        <div>
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
        </div>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>
