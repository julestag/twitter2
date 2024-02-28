<?php 
try {
    $bdd = new PDO("mysql:host=localhost;dbname=twitter", "enzo", "root");
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
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
    <input type="text" value="" id="input">
    <button onclick="createHashtag()">send</button>
    <p id="output"></p>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    function createHashtag(){
        var output = document.getElementById('output');
        var input = document.getElementById('input').value;
        var hashtag = /#(\w+)/g;
        var link = input.replace(hashtag, '<a href="#">#$1</a>');
        output.innerHTML = link;
    }
    
</script>
</body>
</html>