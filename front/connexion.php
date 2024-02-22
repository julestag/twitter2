<?php
$bdd = new PDO('mysql:host=localhost;dbname=twitter;charset=utf8;', 'anis', 'anis');
if(isset($_POST['valider'])){

    $recupUSer = $bdd->prepare('SELECT * FROM messages WHERE content = ? ');
    $recupUser-> execute(array($_POST['pseudo']));
    if($recupUSer->rowCount()>0){
        $_SESSION['id'] = $_post['id'];
        $_SESSION['content'] = $recupUSer->fetch()['content'];
        header('Location: index.php');


    }
    else {
        echo "aucun utilisateur";
    }


}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">

        <input type="text">
        <br>
        <input type="text" name="valider">

    </form>
</body>
</html>