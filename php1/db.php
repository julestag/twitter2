<?php
$servername = "localhost";
$dbname = "twitter";
$username = "enzo";
$password = "root";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>