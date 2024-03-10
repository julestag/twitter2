<?php

include('./php1/db.php');
include('./php1/Infos_user.php');
include('./php1/compteur.php');
include('./php1/show_tweet.php');
include('./php1/show_like.php');

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

    <title>Profile - tweet_academy</title>
</head>


<body>
    <div class="grid grid-col-8">
        <div class="menu col-span-2 w-10 text-align mx-3">
            <img class="w-10" src="./images/logs.png" alt="Logo twitter noir">
            <br>
            <div class="flex items-center">
                <img class="w-8" src="./images/home.png" alt="Logo twitter noir">

                <a class="text-align mx-6" href="fil_actu.php">Home</a>
            </div>
            <br>
            <div class="flex items-center">
                <img class="w-8" src="images/messages.png" alt="Logo messagerie">

                <button class="text-align mx-6 data-target" id="message"><a href="messagerie.php">Messages</a></button>
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
                        <h1 class="text-xl font-bold"><?php echo htmlspecialchars($userInfo['username']); ?></h1>
                        <p class="text-gray-600"><?php echo htmlspecialchars($userInfo['at_user_name']); ?></p>
                    </div>

                    <?php

                    ?>
                    <div class="text-center mb-4">


                        <p class="text-gray-600 mt-2"><?php echo nl2br(htmlspecialchars($userInfo['bio'])); ?></p>
                    </div>

                    <div class="flex justify-around text-center border-t border-gray-300 pt-4">
                        <div>
                            <h2 class="text-lg font-bold" id="compteurTweets"><?php echo $tweetCount; ?></h2>
                            <p class="text-gray-600">Tweets</p>
                        </div>


                        <div id="modalAbonnes" class="modal">
                            <div class="modal-content">
                                <span class="close-button" onclick="fermerModalAbonnes()">&times;</span>
                                <h2>Abonnés</h2>
                                <div id="listeAbonnes">
                                    <?php
                                    foreach ($abonnes as $abonne) {
                                        echo "<p>" . htmlspecialchars($abonne['username']) . " (ID: " . htmlspecialchars($abonne['userId']) . ")</p>";
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold" id="compteurAbonnes"><?php echo $compteurabonne; ?></h2>
                            <p class="text-gray-600">Abonnés</p>
                        </div>



                        <div>
                            <h2 class="text-lg font-bold"><?php echo $compteurabonnement; ?></h2>
                            <p class="text-gray-600">Abonnement</p>
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


                <a href="">


                    <div id="Likes" class="ongletcontent">
                        <h3>Likes</h3>
                        <?php
                        foreach ($likedTweets as $tweet) {
                            echo "<div><p>" . htmlspecialchars($tweet['content']) . "</p><small>Posté le: " . htmlspecialchars($tweet['time']) . "</small></div>";
                        }
                        ?>
                    </div>


                    <script src="./script_parametre.js"></script>

</body>
<script>
    function afficherModalAbonnes() {
        document.getElementById('modalAbonnes').style.display = 'block';
    }

    function fermerModalAbonnes() {
        document.getElementById('modalAbonnes').style.display = 'none';
    }

    document.getElementById('compteurAbonnes').addEventListener('click', afficherModalAbonnes);
</script>


</html>