<?php
$bdd = new PDO('mysql:host=localhost;dbname=twitter;charset=utf8', 'anis', 'anis');
if (!empty($_POST['pseudo']) and !empty($_POST['message'])) {
} else {
  echo "Veuillez compléter tous les champs";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page with Tailwind</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="style.css" rel="stylesheet" />
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" />
</head>

<body>

  <nav class="nav">
    <ul>
      <img class="logs" src="logo.png" alt="">
      <li>Home</li>
      <li>Profile</li>
    </ul>
    <button class="POST">POST</button>
  </nav>
  <section class="element">
    <div class="une">
      <H1 class="h">Message</H1>
    </div>
    <input class="search" type="text">

<?php

$bdd = mysqli_connect("localhost", "anis", "anis", "test");

if ($bdd) {
    $req = "select * from messages";
    $query = mysqli_query($bdd, $req);

    while ($assoc = mysqli_fetch_assoc($query)) {
      if($assoc["id"]=1){
        echo "Id :" . $assoc["id"] . "<br>";
        echo "user1 :" . $assoc["user1"] . "<br>";
        echo "content :" . $assoc["messages"] . "<br>";
      }

 elseif($assoc["id"]= 2){
  echo PHP_EOL;
  echo "Id :" . $assoc["id"] . "<br>";
  echo "user2 :" . $assoc["user2"] . "<br>";
  echo "content :" . $assoc["messages"] . "<br>";
 }
 elseif($assoc["id"]=3){
  
  echo PHP_EOL;
  echo "Id :" . $assoc["id"] . "<br>";
  echo "user2 :" . $assoc["user2"] . "<br>";
  echo "content :" . $assoc["messages"] . "<br>";

 }
  
?>
        </tr>
<?php
    }
} else {
    echo "connexion échoué;";
}
?>
    <button class="ok">Envoyer</button>

  </section>

 


</body>

</html>