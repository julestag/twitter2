<?php
try {
    $bdd = new PDO("mysql:host=localhost;dbname=twitter", "enzo", "root");
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}

if(isset($_POST["mailbis"])){
    $mailbis = $_POST["mailbis"];
    $passwordbis = hash("ripemd160", "vive le projet tweet_academy" . $_POST['passwordbis']);
    $requete = $bdd->prepare("SELECT * FROM user WHERE mail = :mailbis AND password = :passwordbis");
    $requete->execute(
        array(
            "mailbis" => "$mailbis",
            "passwordbis" => "$passwordbis",
        ));

    if($requete->rowCount() > 0){
        $result = $requete->fetch();
        $infoUser = array($result['username']);
        echo json_encode($infoUser);
    } else {
        echo json_encode("error no account");
    }
}