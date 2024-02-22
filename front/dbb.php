<?php
  $servername = "localhost";
  $dbname = "twitter";
  $username = "anis";
  $password = "anis";
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
 