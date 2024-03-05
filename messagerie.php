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
    .buttonok:hover {
        background-color: rosybrown;
        color: white;
    }

    html {
        margin: 0;
        padding: 0;
    }

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
            <img class="w-10" src="./images/logs.png" alt="Logo twitter noir">
            <br>
            <div class="flex items-center">
                <img class="w-8" src="./images/home.png" alt="Logo twitter noir">
                <a class="text-align mx-6" href="fil_actu.php">Home</a>
            </div>
            <br>
            <div class="flex items-center">
                <img class="w-8" src="./images/profile.png" alt="Logo twitter noir">
                <button class="text-align mx-6 data-target" id="message"><a href="profile.php">Profile</a></button>
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

        <div class="bg-gray-100" style="position: relative;left:40vh;bottom:40vh">
            <div class="flex h-screen justify-center items-center">
                <div class="container mx-auto">
                    <div class="flex">
                        <div class="w-1/4 bg-white overflow-auto" style="max-height: 80vh;">
                            <div class="p-4 border-b">
                                <h2 class="text-lg font-semibold">Discussions</h2>
                            </div>
                            <ul class="divide-y">
                                <?php for ($i = 1; $i <= 10; $i++) : ?>
                                    <li class="discussion p-4 hover:bg-gray-50 cursor-pointer" data-discussion="<?php echo $i; ?>">Discussion <?php echo $i; ?></li>
                                <?php endfor; ?>
                            </ul>
                        </div>
                        <div class="flex-1 p-4 flex flex-col" style="max-height: 80vh;">
                            <div class="border-b p-4">
                                <h2 class="text-lg font-semibold">Conversation</h2>
                            </div>
                            <div class="conversation p-4 space-y-4 flex-1 overflow-auto">
                            </div>
                            <div class="mt-auto">

                                <input type="text" class="border p-2 w-full" placeholder="message">
                                <button id="sendMessage" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Envoyer
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="script.js"></script>
        <script src="script_feed.js"></script>
</body>

<script>
    $(document).ready(function() {
        $('.discussion').click(function() {
            var idconv = $(this).data('discussion');
            $.ajax({
                url: 'ajaxmessagerie.php',
                type: 'GET',
                data: {
                    discussion: idconv
                },
                success: function(response) {
                    $('.conversation').html(response);
                }
            });
        });
    });
</script>
<script src="script_parametre.js"></script>



</html>