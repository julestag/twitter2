<?php 
    $requete = $conn -> query("SELECT user.id FROM user INNER JOIN token ON user.id = token.id_user WHERE token.token = '$token'");
    $result = $requete->fetch();
    $idUser = $result["id"];
    function getUserInfo($conn, $idUser)
    {
        $sql = "SELECT username, at_user_name, profile_picture, bio FROM user WHERE id = :idUser";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['idUser' => $idUser]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    $userInfo = getUserInfo($conn, $idUser);