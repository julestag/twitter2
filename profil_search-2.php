<?php

try {
    $bdd = new PDO("mysql:host=localhost;dbname=twitter", "elkatianis", "2535epitech");
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}

$token = $_COOKIE['token'];
//var_dump($token);
if ($token) {



    session_start();
?>
    <?php
    include('./php1/data_user.php');
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

        #follow-button {
            color: #3399FF;
            font-family: "Helvetica";
            font-size: 10pt;
            background-color: #ffffff;
            border: 1px solid;
            border-color: #3399FF;
            border-radius: 3px;
            width: 85px;
            height: 30px;
            position: absolute;
            top: 50px;
            left: 50px;
            cursor: hand;
        }
    </style>

    <body>
        <div class="grid grid-col-8">
            <div class="menu col-span-2 w-10 text-align mx-3">
                <img class="w-10" src="./images/logs.png" alt="Logo twitter noir">
                <br>
                <div class="flex items-center">
                    <img class="w-8" src="./images/home.png" alt="Logo twitter noir">

                    <a class="text-align mx-6" href="#">Home</a>
                </div>
                <br>
                <div class="flex items-center">
                    <img class="w-8" src="./images/profile.png" alt="Logo twitter noir">

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
            <div class="bg-gray-100" style="position: relative;left: 30VH;bottom: 35vh;padding: 10vh">
                <div class="container mx-auto px-4">
                    <div class="w-full max-w-xl mx-auto pt-4">
                        <div class="mb-4">
                            <img class="rounded-full h-32 w-32 mx-auto" src="./images/ok.jpg" alt="Profil">
                        </div>
                        <div class="text-center mb-4">
                            <h1 class="text-xl font-bold"><?php echo htmlspecialchars($userInfo['username']); ?></h1>
                            <p class="text-gray-600"><?php echo htmlspecialchars($userInfo['at_user_name']); ?></p>
                            <p class="text-gray-600">Bio : <?php echo htmlspecialchars($userInfo['bio']); ?></p>

                        </div>

                        <div class="flex justify-around text-center border-t border-gray-300 pt-4">
                            <div>
                                <h2 class="text-lg font-bold"><?php echo $tweetCount; ?></h2>
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
                                <h2 class="text-lg font-bold"><?php echo $compteurabonne; ?></h2>
                                <p class="text-gray-600">Abonnés</p>
                            </div>
                            <div>
                                <h2 class="text-lg font-bold"><?php echo $compteurabonnement; ?></h2>
                                <p class="text-gray-600">Abonnements</p>
                            </div>
                        </div>
                    </div>

                </div>
                <button style="position: relative;left: 10vh;" id="follow-button">+ Follow</button>
                <div class="flex justify-around text-center border-t border-gray-300 pt-4">
                </div>
            </div>
            <br>
            <div>
                <img style="position: relative;bottom: 4vh;width: 4.6%;left: 50vh;" src="./images/email.png" style="width: 5%;height: 20%;position:relative;bottom: 60vh;" alt="">

            </div>


            <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            <script src="script.js"></script>

    </body>
    -

    </html>
    <script>
        $(document).ready(function() {
            $('#follow-button').click(function() {
                var userId = '7'; // personne connecté 
                var followId = '4'; // personne ciblé

                $.post('./php1/addFollower.php', {
                    userId: userId,
                    followId: followId
                }, function(data) {
                    alert(data);
                });
            });
        });
    </script>

<?php
} else {
    header("location: acceuil.html");
}