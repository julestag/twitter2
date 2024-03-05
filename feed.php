<?php
try {
    $bdd = new PDO("mysql:host=localhost;dbname=twitter", "robin", "robin-mysql");
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}
if(isset($_GET['print'])){
    $requete = $bdd->query("SELECT tweet.content, user.at_user_name FROM tweet INNER JOIN user ON tweet.id_user = user.id ORDER BY time DESC");
    $tweets = $requete->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($tweets);
}
?>