<?php
session_start();
require_once 'includes/database.inc.php';

//header("refresh: 5"); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/CSS/memory.css">
    <link rel="shortcut icon" href="assets/images/icone.png" type="image/x-icon">
    <title>Memory</title>
</head>
<body>

    <div id="mainblock">

        <!--Début du header avec l'image de fond-->

        <div id="bg_image">
        <?php
            include_once 'view/header.inc.php'
            ?>

        </div>

        <!--Fin du header-->

        <!--Début des choix des paramètres de jeu-->

        <div id="settings">

            <form>

                <!--Choix de la difficulté du jeu-->

                <div id="difficulty_selection">

                    <label for="difficulty" id="diffLabel">Sélectionnez une difficulté :</label>

                    <select name="difficulty" id="diff_select">
                        <option value="4">😁 Niveau facile : 16 cases 😁</option>
                        <option value="8">🙂 Niveau intermédiaire : 64 cases 🙂</option>
                        <option value="12">😠 Niveau expert : 144 cases 😠</option>
                        <option value="20">👿 Niveau impossible : 400 cases 👿</option>
                    </select>

                </div>

                <!--Choix du thème du jeu-->

                <div id="theme_selection">

                    <label for="theme" id="themeLabel">Sélectionnez un thème : </label>

                    <select name="theme" id="theme_select">
                        <option value="1">Drapeaux</option>
                        <option value="2">Thème 2</option>
                        <option value="3">Thème 3</option>
                    </select>

                </div>

                <button id="launch">Lancer la partie</button>

            </form>

        </div>

        <!--Fin du choix des paramètres du jeu-->

        <!--Début de la grille-->

        <div id="center_part">

            <div id="grilles">

                <?php 

                if (isset($_GET['difficulty'])) {
                    $grille = $_GET['difficulty'];
                }
                else {
                    $grille = 0;
                }

                switch ($grille) {
                    //Grille de 4*4
                    case 4: ?>

                    <div id="grille_4" class="grille">
                        <table>
                            <caption>Niveau : Facile</caption>

            <?php  break;
                    
                    //Grille de 8*8
                    case 8: ?> 

                    <div id="grille_8" class="grille">
                        <table>
                            <caption>Niveau : Intermédiaire</caption>

            <?php   break;

                    //Grille de 12*12
                    case 12: ?> 

                    <div id="grille_12" class="grille">
                        <table>
                            <caption>Niveau : Difficile</caption>

            <?php   break;

                    //Grille de 20*20
                    case 20: ?> 

                    <div id="grille_20" class="grille">
                        <table>
                            <caption>Niveau : Impossible</caption>

        <?php   }

                $case = 0;

                for ($i = 0; $i < $grille; $i++) {
                    echo '<tr>';
                    for ($j = 0; $j < $grille; $j++) {
                        $case++;
                        echo '<td class="memoryCase" id=case_'.$case.'>
                        <div class="backCard"></div>
                        <div class="frontCard"><img src="assets/images/theme_flags/france.png" class="image"></div>
                        </td>';
                    }
                    echo '</tr>';
                }
                
                ?>

                        </table>

                    </div>

            </div>

            <!--Fin de la grille-->

            <!--Début de la partie chat-->

        <div id="chat">

            <div id="chat_title">

                <!--<img src="assets/images/bot_avatar.png" alt="bot" width="50">-->
                <p>Chat Général </p>
                <button id="hide_chat">-</button>

            </div>

            <div id="messages_area">

            <div id="message">


            <!-- 1ER MESSAGE DE USER -->

            <!-- CHAT -->
            <div id="flex_user_message">
            <div id="user_message">
            </div> <br>
            </div>
            <div id="flex_other_message">
            <p>salut</p>
            </div>


            <!-- CHAT -->



            </div>
            </div>
   

            </div>

            <div id="message_input">

                <form action="" method="post">
                    <input type="text" name="message" id="message" placeholder="Votre message...">
                    <button type="submit">Envoyer</button>
                </form>

            </div>

            </div>

            <div id="chat_icon">
            <img src="assets/images/chat_icon.png" width="40">
            </div>
        
        </div>

            <!--Fin de la partie chat-->
        
        <!--Début des stats de jeu-->

        <div id="game_stats">

            <div id="turn">
            
                Tour : <span id="turn_counter">0</span>

            </div>

            <div id="time">
            
                Temps : <span id="counter">0</span> sec

            </div>

        </div>

        <!--Fin des stats de jeu-->

        <!--Début des règles du jeu-->

        <div id="rules">

            <h2>Règles du jeu</h2>

            <div id="description">
                Le but du Memory est de retourner l'ensemble des cartes de la grille. <br>
                Pour ce faire, il faudra retrouver et assembler toutes les paires d'images. <br>
                À chaque tour, le joueur choisit deux cartes. Si celles-ci sont identiques, elles restent retournées. <br>
                Sinon elles restent dans leur position initiale.
            </div>

        </div>

        <!--Fin des règles du jeu-->

        <!--Début du footer-->

        <?php

        include_once 'view/footer.inc.php';
        ?>
        <!--Fin du footer-->

    </div>

    <script src="assets/JS/memory.js"></script>
    
</body>
</html>