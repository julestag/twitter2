<?php

include("./db.php");
if (isset($_POST['userId']) && isset($_POST['followId'])) {
    $userId = $_POST['userId'];
    $followId = $_POST['followId'];
    $check = $conn->prepare("SELECT * FROM follow WHERE id_user = ? AND id_follow = ?");
    $check->execute([$userId, $followId]);
    if ($check->rowCount() > 0) {
        echo "Déja abonné.";
    } else {
        $query = $conn->prepare("INSERT INTO follow (id_user, id_follow, time) VALUES (?, ?, NOW())");
        if ($query->execute([$userId, $followId])) {
            echo "Abonnement réussi.";
        } else {
            echo "Erreur";
        }
    }
}

