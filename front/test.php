<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $bdd = mysqli_connect("localhost", "anis", "anis", "test");
    // 
    if ($bdd) {
        $req = "select * from messages";
        $query = mysqli_query($bdd, $req);

        while ($assoc = mysqli_fetch_assoc($query)) {
            echo "Id :" . $assoc["id"] . "<br>";
            echo "user1 :" . $assoc["user1"] . "<br>";
            echo "user2:" . $assoc["user2"] . "<br>";
            echo "content :" . $assoc["messages"] . "<br>";
    ?>
            </tr>
    <?php
        }
    } else {
        echo "connexion échoué;";
    }
    ?>

</body>

</html>