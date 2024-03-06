<?php
session_start();
define('STDOUT', fopen('php://stdout', 'w'));

  $username = 'robin';
  $password = 'robin-mysql';

  try{
    $connexion = new PDO('mysql:host=localhost;dbname=twitter', $username,$password);
}catch(PDOException $e){
  echo "erreur: " . $e -> getMessage();
}

$query = $connexion -> prepare("SELECT id_user,content FROM messages WHERE id_convo LIKE '1'");
$query -> execute();
echo json_encode($query -> fetchAll(PDO::FETCH_ASSOC));
//fwrite(STDOUT, print_r($valeur, true));
?>

