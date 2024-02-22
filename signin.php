<?php
try {
    $bdd = new PDO("mysql:host=localhost;dbname=test", "enzo", "root");
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}

if(isset($_POST["email"])){
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $requete = $bdd->prepare("SELECT * FROM test WHERE email = :email AND pwd = :pwd");
    $requete->execute(
        array(
            "email" => "$email",
            "pwd" => "$pwd",
        ));

    if($requete->rowCount() > 0){
    echo json_encode("connected");
    } else {
        echo json_encode("error no account");
    }
}