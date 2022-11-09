<?php 
require_once 'includes/database.inc.php'
?>
<!DOCTYPE html>
<html>


<head> <!-- Début du Head -->
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Mon Espace</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='assets/CSS/myaccount.css'>
    <link rel="shortcut icon" href="assets/images/icone.png" type="image/x-icon">
    <script src='myaccount.js'></script>
</head> <!-- Fin du Head -->


<body>
    <div> <!-- Début de la div Body-->


        <div class="image_back">  <!--div pour l'image de fond -->

            <!--debut de la Nav barre -->
            <?php
            include_once 'view/header.inc.php'
            ?>
            <!--fin de la nav barre -->
            
            <!--Titre principal-->
        <h1>
            MON ESPACE
        </h1>
    </div>










    <div id="profil"> <!-- Début du profil-->
        <div id="profil_avatar"> <!-- Photo de profil-->
            <a href="change_avatar.php">
            <img alt="Avatar" src="https://cdn1.epicgames.com/epic/offer/WatchDogs2_PortraitPromo-1280x1420-8ef789a7185a709178f51c0e9d42ee9a.jpg" id="avatar">
            </a>
        </div>
        <div id="profil_data"> <!-- Information du profil-->
            <h4 id="nickname">Xx_DarKSylvian_xX</H4> <!-- Pseudo du compte -->
            <p>Inscrit depuis le 06 octobre 2019</p> <!-- Historique d'inscription -->
            <br>
            <p id="best">Meilleur score : 6780</p> <!-- Meilleur score -->
            <p id="best">Meilleur temps : 38.56s mode Facile</p> <!-- Meilleur temps et sur quelle mode-->
        </div>
    </div> <!-- Fin du profil-->

    <div id="level"> <!-- Début de la barre de progression -->
        <p>18</p> <!-- Level précédent -->
        <div id="barre">
        <div id="level_progress">90%</div>
        </div>
        <p>19</p> <!-- Level Suivant-->
    </div> <!-- Fin de la barre de progression -->

    <div id="game_stats"> <!-- Début des scores des niveaux de jeu -->
        
        <div id="facile"> <!-- Niveau facile -->
            <a href="level_easy.php">
            <img alt="easy" src="assets/images/facile.jpeg" id="easy"></a>
            <p id="pl">Facile</p>
            <br><p id="played"> Joué : 5</p>
            <br><p id="played"> Meilleur temps : 38.56s</p>


        </div>
        <div id="intermediaire"> <!-- Niveau intermédiaire --> 
            <a href="level_medium.php">
            <img alt="medium" src="assets/images/medium.jpeg" id="medium"></a>
            <p id="pl">Intermédiaire</p>
            <br><p id="played"> Joué : 3</p>
            <br><p id="played"> Meilleur temps : 56.08s</p>


        </div>
        <div id="expert"> <!-- Niveau expert -->
            <a href="level_expert.php">
            <img alt="expert" src="assets/images/expert.jpeg" id="expert"></a>
            <p id="pl">Expert</p>
            <br><p id="played"> Joué : 1</p>
            <br><p id="played"> Meilleur temps : X</p>


        </div>
        <div id="impossible"> <!-- Niveau impossible -->     
            <a href="level_impossible.php">
            <img alt="impossible" src="assets/images/impossible.jpeg" id="impossible"></a>
            <p id="pl">Impossible</p> 
            <br><p id="played"> Joué : 0</p>
            <br><p id="played"> Meilleur temps : X</p>

        </div>    
    </div> <!-- Fin des scores des niveaux de jeu -->




  
    <div id="modification"> <!-- Début des icones pour modifier ses informations-->
        <div id="mail"> <!-- Image liens vers les options modifier adresse mail-->
            <li><a href="#edit_mail">
            <img alt="Mail" src="https://icones.pro/wp-content/uploads/2021/03/icone-gmail-logo-png-orange.png" id="email"></a></li>
            <p id="pl">Modifier votre adresse mail</p>
        </div>     
        <div id="mdp"> <!-- Image liens vers les options modifier password-->
            <a href="#edit_password">
            <img alt="Password" src="https://icones.pro/wp-content/uploads/2022/08/icone-de-cadenas-de-securite-orange.png" id="password"></a>
            <p id="pl"> Modifier votre mot de passe</p>
        </div>
    </div> <!-- Fin des icones pour modifier ses informations-->


    <br>
    <br id="edit_mail"> <!-- Ancre pour la modification de l'email -->
    <br>
    <br>


    <div id="form"> <!-- Début du Formulaire de modification d'email-->
        <h4 id="edit_info">Modifier votre adresse mail</h4>
        <form class="form">
            <input type="text" class="old_edit" placeholder="Ancienne adresse mail"><br><br> <!-- Zone de texte "Ancienne adresse mail" -->
            <input type="Sujet" class="new_edit" placeholder="Nouvelle adresse mail"><br><br> <!-- Zone de texte "Nouvelle adresse mail" -->
            <input type="Message" class="security_edit" placeholder="Mot de passe"></textarea><br><br> <!-- Zone de texte "Mot de passe" -->
            <button id="bouton_connexion"> Envoyer </button> <!-- Bouton Envoyer -->
        </form>
    </div> <!-- Fin du FFormulaire de modification d'email-->


    <br>
    <br id="edit_password"> <!-- Ancre pour la modification du mot de passe -->
    <br>
    <br>


    <div id="form"> <!-- Début du Formulaire de modification de mot de passe-->
        <h4 id="edit_info">Modifier votre mot de passe</h4>
        <form class="form">
            <input type="text" class="old_edit" placeholder="Ancien mot de passe"><br><br> <!-- Zone de texte "Ancien mot de passe" -->
            <input type="Sujet" class="new_edit" placeholder="Nouveau mot de passe"><br><br> <!-- Zone de texte "Nouveau mot de passe" -->
            <input type="Message" class="security_edit" placeholder="Votre adresse mail"></textarea><br><br> <!-- Zone de texte "Votre adresse mail" -->
            <button id="bouton_connexion"> Envoyer </button> <!-- Bouton Envoyer -->
        </form>
    </div> <!-- Fin du FFormulaire de modification de mot de passe-->




    <?php

include_once 'view/footer.inc.php';
?><!-- Fin du Footer-->


    </div> <!-- Fin de la div Body-->
</body>
</html>