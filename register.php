<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Inscription</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/CSS/register.css'>
    <link rel="shortcut icon" href="assets/images/icone.png" type="image/x-icon">
    <script src='main.js'></script>
    
</head>
<body>
    <div id="mainblock">
        <div class="image_back">  <!--div pour l'image de fond -->

            <!--debut de la Nav barre -->
            <?php
            include_once 'view/header.inc.php'
            ?>
            <!--fin de la nav barre -->
    
            <!--Titre principal-->
        <h1>
            INSCRIPTION
        </h1>
    </div>

    <!--debut de l'insciption-->
    <div id="login">
        <form action="">
            <div id="email">
                <!-- Input pour l'email-->
                <input type="text" class="input_connexion" placeholder="Email">
            </div>
            <br>
            <div id="motdepasse">
                <!-- Input pour le pseudo-->
                <input type="text" class="input-mdp" placeholder="Pseudo">
            </div>
            <br>
            <div id="motdepasse">
                <!-- Inpur pour le mot de passe-->
                <input type="password" class="input-mdp" placeholder="Mot de passe">
            </div>
            <br>
            <div id="motdepasse">
                <!-- Input pour confirmer le mot de passe -->
                <input type="password" class="input-mdp" placeholder="Confirmer Mot de passe">
            </div>
        </form>
        <br>
            <!-- Bouton pour l'inscription-->
            <button id="bouton_inscription">
                Inscription
            </button>
    </div>
    <!--fin de l'insciption-->

    <!--debut du footer-->
    <?php

        include_once 'view/footer.inc.php';
        ?>

    <!--Fin du footer-->




    
</body>
</html>


