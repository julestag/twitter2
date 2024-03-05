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
