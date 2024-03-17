<?php

try {
    $connexion = new PDO("mysql:host=localhost;dbname=twitter", "elkatianis", "2535epitech");
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}

$key = $_POST["key"];

$query = $connexion -> prepare("INSERT INTO tweet(id_user,content) VALUES ('1','$key')");
$query -> execute();