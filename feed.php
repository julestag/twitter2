<?php
try {
    $bdd = new PDO("mysql:host=localhost;dbname=twitter", "enzo", "root");
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}
if(isset($_POST['print'])){
    $requete = $bdd->query("SELECT * FROM tweet ORDER BY time DESC");
    $tweets = $requete->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($tweets);
}
?>