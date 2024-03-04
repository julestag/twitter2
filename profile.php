<?php
$servername = "localhost";
$dbname = "twitter";
$username = "elkatianis";
$password = "2535epitech";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/output.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Profile - tweet_academy</title>
</head>
<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 40%;
    }

    .close-button {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close-button:hover,
    .close-button:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .button-settings {
        position: relative;
        top: 5vh;
        background-color: grey;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .button-settings:hover {
        background-color: #0d8bf2;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .ongletcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
        margin-top: 20px;
    }

    .ongletbutton {
        background-color: #f1f1f1;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
    }

    .ongletbutton:hover {
        background-color: #ddd;
    }

    .ongletbutton.active {
        background-color: #ccc;
    }

    body {
        background-color: #f0f0f0;
    }

    .notification-button {
        position: relative;
        background-color: transparent;
        border: none;
        cursor: pointer;
        font-size: 32px;
        color: #333;
        top: 10vh;
        margin-left: 3vh;
    }

    .notification-button:hover {
        color: #0d8bf2;
    }
</style>

<body>
    <div class="grid grid-col-8">
        <div class="menu col-span-2 w-10 text-align mx-3">
            <img class="w-10" src="./logs.png" alt="Logo twitter noir">
            <br>
            <div class="flex items-center">
                <img class="w-8" src="./images/home.png" alt="Logo twitter noir">

                <a class="text-align mx-6" href="#">Home</a>
            </div>
            <br>
            <div class="flex items-center">
                <img class="w-8" src="images/profile.png" alt="Logo twitter noir">

                <button class="text-align mx-6 data-target" id="message"><a href="#">Messages</a></button>
            </div>

            <button class="button-settings" onclick="buttonreglage()">
                <i class="fas fa-cog"></i> Réglages
            </button>

            <button class="notification-button" onclick="notif()">
                <i class="fas fa-bell"></i>
            </button>

            <div id="notificationsModal" class="modal">
                <div class="modal-content">
                    <span class="close-button" onclick="notif()">&times;</span>
                    <h2>Notifications</h2>
                    <p>0 Notifications</p>
                </div>
            </div>



            <div id="settingsModal" class="modal">
                <div class="modal-content">
                    <span class="close-button" onclick="fermemodal()">&times;</span>
                    <h2>Personnaliser la page</h2>
                    <button style="border: 1px solid black;border-radius: 3vh;padding: 1vh;" onclick="changeBackgroundColor('#CCCCCC')">Gris</button>
                    <button style="border: 1px solid black;border-radius: 3vh;padding: 1vh;" onclick="changeBackgroundColor('#a4d4f4')">blue</button>
                    <h2>Changer la Font-Size</h2>
                    <button style="border: 1px solid black; border-radius: 3vh; padding: 1vh;" onclick="incremsize()">Augmenter la taille de la police</button>
                    <button style="border: 1px solid black; border-radius: 3vh; padding: 1vh;" onclick="decremsize()">Diminuer la taille de la police</button>

                </div>
            </div>

            <br>
        </div>
        <div class="bg-gray-100" style="position: relative;left: 30VH;bottom: 35vh;padding: 10vh;">
            <div class="container mx-auto px-4">
                <div class="w-full max-w-xl mx-auto pt-4">
                    <div class="mb-4">
                        <img class="rounded-full h-32 w-32 mx-auto" src="./images/ok.jpg" alt="Profil">
                    </div>
                    <div class="text-center mb-4">
                        <h1 class="text-xl font-bold">Nom d'utilisateur</h1>
                        <p class="text-gray-600">@username</p>
                    </div>
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

                    function showtweet($userId, $conn) {
                        $sql = "SELECT content as tweet FROM tweet WHERE id_user = :userId ORDER BY time DESC";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute(['userId' => $userId]);
                        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
                    }
                    $userId = 1;
                    $tweets = showtweet($userId, $conn);
                    
      
                    ?>
                    <div class="flex justify-around text-center border-t border-gray-300 pt-4">
                        <div>
                            <h2 class="text-lg font-bold"><?php echo $tweetCount; ?></h2>
                            <p class="text-gray-600">Tweets</p>
                        </div>

                        <div>
                            <h2 class="text-lg font-bold"><?php echo $compteurabonne; ?></h2>
                            <p class="text-gray-600">Abonnés</p>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold"><?php echo $compteurabonnement; ?></h2>
                            <p class="text-gray-600">Abonnemenst</p>
                        </div>
                    </div>
                </div>
                <br>

                <div class="tabs">
                    <button class="ongletbutton" onclick="onglets(event, 'Tweets')">Tweets</button>
                    <button class="ongletbutton" onclick="onglets(event, 'Likes')">Likes</button>
                </div>

                <br>
                <div id="Tweets" class="ongletcontent">
    <h3>Tweets</h3>
    <?php 
    foreach ($tweets as $tweet) {
        echo "<p>" . htmlspecialchars($tweet['tweet']) . "</p>";
    }
    ?>
</div>





                <div id="Likes" class="ongletcontent">

                    <h3>Likes</h3>
                    <p>Contents Likes</p>
                    <p>Content Likes 2</p>
                    
                </div>


                <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                <script src="script.js"></script>

</body>
<script>
    function onglets(evt, tabName) {
        var i, ongletcontent, ongletbutton;
        ongletcontent = document.getElementsByClassName("ongletcontent");
        for (i = 0; i < ongletcontent.length; i++) {
            ongletcontent[i].style.display = "none";
        }
        ongletbutton = document.getElementsByClassName("ongletbutton");
        for (i = 0; i < ongletbutton.length; i++) {
            ongletbutton[i].className = ongletbutton[i].className.replace(" active", "");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementsByClassName("ongletbutton")[0].click();
    });
    //
    function buttonreglage() {
        document.getElementById("settingsModal").style.display = "block";
    }

    function fermemodal() {
        document.getElementById("settingsModal").style.display = "none";
    }

    function changeBackgroundColor(color) {
        document.body.style.backgroundColor = color;
        localStorage.setItem('backgroundColor', color);
        fermemodal();

    }

    document.addEventListener("DOMContentLoaded", function() {
        var sauvegardebg = localStorage.getItem('backgroundColor');
        if (sauvegardebg) {
            document.body.style.backgroundColor = sauvegardebg;
        }
        var sauvegardefs = localStorage.getItem('fontSize');
        if (sauvegardefs) {
            document.body.style.fontSize = `${sauvegardefs}px`;
        }
        document.getElementsByClassName("ongletbutton")[0].click();
    });



    function paramsize(fontSize) {
        document.body.style.fontSize = `${fontSize}px`;
        localStorage.setItem('fontSize', fontSize);
    }

    function incremsize() {
        var currentSize = parseFloat(localStorage.getItem('fontSize') || window.getComputedStyle(document.body).fontSize);
        var newSize = currentSize + 1;
        paramsize(newSize);
    }

    function decremsize() {
        var currentSize = parseFloat(localStorage.getItem('fontSize') || window.getComputedStyle(document.body).fontSize);
        var newSize = currentSize - 1;
        paramsize(newSize);
    }
    document.addEventListener("DOMContentLoaded", function() {
        var enregistresize = localStorage.getItem('fontSize');
        if (enregistresize) {
            paramsize(parseFloat(enregistresize));
        }
        document.getElementsByClassName("ongletbutton")[0].click();
    });

    function notif() {
        var modal = document.getElementById("notificationsModal");
        if (modal.style.display === "block") {
            modal.style.display = "none";
        } else {
            modal.style.display = "block";
        }
    }
</script>



</html>