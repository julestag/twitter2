<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="acceuil.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="all">
        <div class="left-side">
            <img src="background-image.jpg" alt="" class="background-image">
            <img src="logo.png" alt="logo twitter" class="logo">
        </div>

        <div class="right-side">
            <div class="right-side-content">
                <h1>Ça se passe ici et maintenant</h1>
                <h2>Inscrivez-vous.</h2>
                <button id="signupButton" onclick="openSignupForm()">Créer son compte</button>
                <div class="signup-popup">
                    <div class="form-popup" id="signupForm">
                        <form class="form-container" method="POST" onsubmit="return sendData();">
                            <h2>Remplissez vos informations</h2>
                            <label for="lastname">
                                <strong>Nom / Prénom</strong>
                            </label>
                            <input type="text" id="lastname" placeholder="Votre Nom et Prénom" name="lastname" required />
                            <label for="pseudo">
                                <strong>Pseudo</strong>
                            </label>
                            <input type="text" id="pseudo" placeholder="Pseudo" name="pseudo" required />
                            <label for="birthdate">
                                <strong>Date de Naissance</strong>
                            </label>
                            <input type="date" id="birthdate" name="birthdate" required />
                            <label for="email">
                                <strong>E-mail</strong>
                            </label>
                            <input type="email" id="email" placeholder="Votre Email" name="email" required />
                            <label for="pwd">
                                <strong>Mot de passe</strong>
                            </label>
                            <input type="password" id="pwd" placeholder="Votre Mot de passe" name="pwd" required />
                            <button type="submit" class="btn" onclick="closeSignupForm()">S'inscrire</button>
                            <button type="button" class="btn cancel" onclick="closeSignupForm()">Fermer</button>
                        </form>
                    </div>
                </div>
                <hr id="hr1">
                <p>Vous avez déja un compte ?</p>
                <button id="signinButton" class="open-button" onclick="openSigninForm()">Se connecter</button><br><br>
                <div class="login-popup">
                    <div class="form-popup" id="signinForm">
                      <form class="form-container" method="POST" onsubmit="return checkData();">
                        <h2>Entrez vos informations</h2>
                        <label for="emailbis">
                          <strong>E-mail</strong>
                        </label>
                        <input type="text" id="emailbis" placeholder="Votre Email" name="emailbis" required />
                        <label for="pwdbis">
                          <strong>Mot de passe</strong>
                        </label>
                        <input type="password" id="pwdbis" placeholder="Votre Mot de passe" name="pwdbis" required />
                        <button type="submit" class="btn" onclick="closeSigninForm()">Connecter</button>
                        <button type="button" class="btn cancel" onclick="closeSigninForm()">Fermer</button>
                      </form>
                    </div>
                </div>
                <div id="conditions">
                    <p>En vous inscrivant, vous acceptez les <a href="#">Conditions d'utilisation</a> et la <a
                            href="#">Politique de confidentialité</a>,</p>
                    <p>notamment l'utilisation des cookies.</p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="signin.js"></script>
</body>
</html>