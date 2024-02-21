<?php 

try {
    $bdd = new PDO("mysql:host=localhost;dbname=twitter", "enzo", "root"); 
}
catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
}

if(isset($_GET["lastname"])){
    $lastname = $_GET["lastname"];
    $firstname = $_GET["firstname"];
    $email = $_GET["email"];
    $pwd = $_GET["pwd"];
    $requete=$this->bdd->prepare("INSERT INTO twitter (lastname, firstname, email, pwd) VALUES (:lastname, :firstname, :email, :pwd)");
    $requete->execute(
        array(
            "lastname" => "$lastname",
            "firstname" => "$firstname",
            "email" => "$email",
            "pwd" => "$pwd",
        )
    );
}