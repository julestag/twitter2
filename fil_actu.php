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
                <img class="w-8" src="images/home.png" alt="Logo twitter noir">
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
            <div>
                <button style="border:1px solid black;padding:1vh;border-radius:5px;position:relative;bottom:35vh;left:165vh;">Déconnexion</button>
            </div>
            <br>
        </div>
    </div>
    <br>
    </div>
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




        //
        ''

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
    </div>



    <div class="col-span-4 mb-4 w-1/2 p-4 mx-auto text-center border">
        <ul class="tab-list flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
            <li class="me-2" role="presentation">
                <button data-target="tab1" href="#" aria-current="page" class="inline-block p-4 border-b-2 rounded-t-lg hover:border-blue-300 dark:hover:text-blue-300">Suggestion</button>
            </li>
            <li class="me-2">
                <button data-target="tab2" href="#" class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-blue-300 dark:hover:text-blue-300">Following</button>
            </li>
        </ul>

        <form>
            <textarea placeholder="Write your tweet here.." id="area_tweet"></textarea>
            <hr class="hr_post w-9/12 ml-20">
            <a href="#"><img class="img-photo" src="images/img.png" alt="logo ajout image"></a>
            <a href="#_" class="post inline-block px-5 py-0 mx-auto text-white bg-blue-500 rounded-full hover:bg-blue-700 md:mx-0">Post</a>
        </form>

        <hr class="w-full mt-5">
        <div class="tab-pane h-screen flex justify-center grid-cols-2 mb-4 w-1/2 p-4 ">
            <div data-content id="tab1" class="tab-content">
                <p>gdzdhhihuizhuiah</p>
            </div>

            <div data-content id="tab2" class="tab-content">
                <p>test2</p>
            </div>

        </div>
    </div>
    <div class="col-span-2 w-10 text-align mx-3">
        <input style="margin-right: 80vh;width:40vh;" class="search mt-5 mr-5 bg-gray-100 p-1 rounded-full" type="text" placeholder="">
        <button style="border: 1px solid black;bottom:182.3vh;position:relative;left:120vh;border-radius:3vh;left:106vh;padding:0.4vh;background-color:grey;">Search</button>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="script_feed.js"></script>
</body>
<script src="script.js"></script>

</html>