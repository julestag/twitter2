<?php
$bdd = new PDO('mysql:host=localhost;dbname=twitter;', 'elkatianis', '2535epitech');
$allusers = $bdd->query('select * from user inner join tweet;');

if (isset($_GET['s']) and !empty($_GET['s'])) {
    $recherche = htmlspecialchars($_GET['s']);
    $allusers = $bdd->query('select * from user inner join tweet;');
}


