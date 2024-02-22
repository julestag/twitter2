<?php
session_start();
  $username = 'robin';
  $password = 'robin-mysql';

  try{
    $connexion = new PDO('mysql:host=localhost;dbname=twitter', $username,$password);
}catch(PDOException $e){
  echo "erreur: " . $e -> getMessage();
}

$message = $_POST["message"];

$query = $connexion -> prepare("INSERT INTO messages (id_convo,id_user,content) VALUES ('1','1','$message')");
$query -> execute();
