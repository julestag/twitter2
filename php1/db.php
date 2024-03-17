<?php
$servername = "localhost";
$dbname = "twitter";
$username = "jules";
$password = "F05D730D5F";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>