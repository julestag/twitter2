<?php
define('STDOUT', fopen('php://stdout', 'w'));
   fwrite(STDOUT, print_r($_POST, true));

if (isset($_POST['tweet'])) {
    $tweet = htmlspecialchars($_POST['tweet']);

    // Connexion à la base de données
    $bdd = new PDO('mysql:host=localhost;dbname=twitter;charset=utf8', 'enzo', 'root');

    // Préparation de la requête d'insertion
    $stmt = $bdd->prepare("INSERT INTO tweet (id_user, content) VALUES (1, :content)");

    // Exécution de la requête avec les paramètres
    $stmt->execute(array(':content' => $tweet));

    // Vérification de l'insertion
    if ($stmt->rowCount() > 0) {
        echo "Tweet inséré avec succès !";
    } else {
        echo "Une erreur s'est produite lors de l'insertion du tweet.";
    }
}
?>