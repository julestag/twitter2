<?php
$servername = "localhost";
$dbname = "twitter";
$username = "elkatianis";
$password = "2535epitech";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>