<?php
try {
    $bdd = new PDO("mysql:host=localhost;dbname=twitter", "robin", "robin-mysql");
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}
if(isset($_GET['print'])){
    $requete = $bdd->query("SELECT tweet.content, user.at_user_name,user.username,profile_picture,COUNT(likes.id_user) FROM tweet INNER JOIN user ON tweet.id_user = user.id LEFT JOIN likes ON tweet.id = likes.id_tweet GROUP BY tweet.id ORDER BY tweet.time DESC");
    $tweets = $requete->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($tweets);
}
?>