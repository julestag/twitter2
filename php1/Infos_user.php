<?php 
       function getUserInfo($userId, $conn)
       {
           $sql = "SELECT username, at_user_name, profile_picture, bio FROM user WHERE id = :userId";
           $stmt = $conn->prepare($sql);
           $stmt->execute(['userId' => $userId]);
           return $stmt->fetch(PDO::FETCH_ASSOC);
       }

       $userId = 1;
       $userInfo = getUserInfo($userId, $conn);