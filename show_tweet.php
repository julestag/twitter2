<?php
function showtweet($userId, $conn)
{
    $sql = "SELECT content as tweet FROM tweet WHERE id_user = :userId ORDER BY time DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['userId' => $userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
$userId = 1;
$tweets = showtweet($userId, $conn);




function showAbonnes($userId, $conn)
{

    $sql = "SELECT u.username, u.id as userId
            FROM user u
            JOIN follow f ON u.id = f.id_follow
            WHERE f.id_user = :userId
            ORDER BY f.time DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['userId' => $userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$userId = 1;
$abonnes = showAbonnes($userId, $conn);
