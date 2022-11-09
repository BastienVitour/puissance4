<?php 
require_once 'includes/database.inc.php'
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Connexion</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/CSS/login.css'>
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
            CONNEXION
        </h1>
    </div>
    
    <!--debut de la partie de connexion-->
    <div id="login">
        <form action="">
            <div id="email">
                <!--input pour l'email-->
                <input type="Email" class="input_connexion" placeholder="Email">
            </div>
            <br>
            <div id="motdepasse">
                <!-- input pour le mot de passe-->
                <input type="password" class="input-mdp" placeholder="Mot de passe">
            </div>
        </form>
        <br>
            <!-- Bouton pour la connexion-->
            <button id="bouton_connexion">
                Connexion
            </button>
            <!-- Bouton pour l'inscription-->
            <button id="bouton_inscription"  onclick="window.location.href = 'register.php';">
                Inscription
            </button>
    </div>
    <!-- fin de la partie de connexion-->



    <!--debut du footer-->
    <?php

include_once 'view/footer.inc.php';
?>

    <!--Fin du footer-->
    
</div>
    
</body>
</html>


