<?php
try {
    $bdd = new PDO("mysql:host=localhost;dbname=twitter", "enzo", "root");
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}

$token = $_COOKIE['token'];
var_dump($token);
if($token){
    $requete = $bdd->query("SELECT * FROM user INNER JOIN token ON token.id_user = user.id WHERE token.token = '$token'");
    $result = $requete->fetchAll();
    foreach($result as $infos) {
        echo $infos["username"];
    }
} else {
    header("location: acceuil.html");
}
?>