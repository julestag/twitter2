<?php

function compteurtweet($userId, $conn)
{
    $sql = "SELECT COUNT(*) AS tweet_count FROM tweet WHERE id_user = :userId";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['userId' => $userId]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row['tweet_count'];
}
$userId = 1;
$tweetCount = compteurtweet($userId, $conn);


function compteurabonne($userId, $conn)
{
    $sql = "SELECT COUNT(*) AS subscriber_count FROM subscriptions WHERE id_user = :userId";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['userId' => $userId]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row['subscriber_count'];
}
$userId = 1;
$compteurabonne = compteurabonne($userId, $conn);

function compteurabonnement($userId, $conn)
{
    $sql = "SELECT COUNT(*) AS abonnement from follow where id_user = :userId";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['userId' => $userId]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row['abonnement'];
}
$userId = 1;
$compteurabonnement = compteurabonnement($userId, $conn);
