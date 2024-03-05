<?php
if (isset($_GET['tweet'])) {
    $tweet = htmlspecialchars($_GET['tweet']);

    $bdd = new PDO('mysql:host=localhost;dbname=twitter;charset=utf8', 'jules', '');

    $stmt = $bdd->prepare("INSERT INTO tweet (id_user, content) VALUES (1, :content)");

    $stmt->execute(array(':content' => $tweet));

    if ($stmt->rowCount() > 0) {
        echo "Tweet inséré avec succès !";
    } else {
        echo "Une erreur s'est produite lors de l'insertion du tweet.";
    }
}
?>