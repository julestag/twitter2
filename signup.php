<?php
try {
    $bdd = new PDO("mysql:host=localhost;dbname=test", "enzo", "root");
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}

if (isset($_POST['firstname'])) {
    $email = $_POST['email'];
    $requete = $bdd->prepare("SELECT * FROM test WHERE email=?");
    $requete->execute(["$email"]); 
    $emails = $requete->fetch();
    if ($emails) {;
    echo json_encode("error email");
    } else {
        $birthdate = $_POST['birthdate'];
        $aujourdhui = date("Y-m-d");
        $diff = date_diff(date_create($birthdate), date_create($aujourdhui));
        $age = $diff->format('%y');
        if($age > 18){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $pwd = $_POST['pwd'];
            $request = $bdd->prepare("INSERT INTO test (lastname, firstname, birthdate, email, pwd) VALUES (?, ?, ?, ?, ?)");
            $request->execute([$lastname, $firstname, $birthdate, $email, $pwd]);
            echo json_encode("no errors");
        } else {
            echo json_encode("error birthdate");
        }
    }
}
?>