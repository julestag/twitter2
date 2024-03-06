<?php
$bdd = new PDO('mysql:host=localhost;dbname=twitter;charset=utf8', 'enzo', 'root');

$stmt = $bdd->query("SELECT * FROM tweet");
$tweets = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($tweets);
?>
