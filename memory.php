
<?php
session_start();
require_once 'includes/database.inc.php';

//header("refresh: 5"); 
echo $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/CSS/memory.css">
    <link rel="shortcut icon" href="assets/images/icone.png" type="image/x-icon">
    <title>Memory </title>
</head>
<body>
<?php                 

?>

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
        <option value="2">Animaux</option>
        <option value="3">Thème 3</option>
    </select>

</div>

<button id="launch">Lancer la partie</button>

</form>

        <!--Fin du choix des paramètres du jeu-->

        <!--Début de la grille-->

        <div id="center_part">

            <?php 
            
            $grille = 20;


            switch ($grille) {
                //Grille de 5*5
                case 5: ?>

                <div id="grille_5" class="grille">
                    <table>
                        <caption>Niveau : Facile</caption>

                        <?php 
                        for ($i = 0; $i < 5; $i++) {
                            echo '<tr>';
                                if ($i == 2) {
                                    echo '<td></td>';
                                    echo '<td></td>';
                                    echo '<th></th>';
                                    echo '<td></td>';
                                    echo '<td></td>';
                                }
                                else {
                                for ($j = 0; $j < 5; $j++) {
                                    echo '<td></td>';
                                } }
                            echo '</tr>';
                        }
                        ?>
                    </table>
                </div>
                    
       <?php    break;
                
                //Grille de 8*8
                case 8: ?> 

                <div id="grille_8" class="grille">
                    <table>
                        <caption>Niveau : Intermédiaire</caption>

                        <?php 
                        for ($i = 0; $i < 8; $i++) {
                            echo '<tr>';
                                for ($j = 0; $j < 8; $j++) {
                                    echo '<td></td>';
                                }
                            echo '</tr>';
                        }
                        ?>
                    </table>
                </div>

        <?php   break;

                //Grille de 12*12
                case 12: ?> 

                <div id="grille_12" class="grille">
                    <table>
                        <caption>Niveau : Difficile</caption>

                        <?php 
                        for ($i = 0; $i < 12; $i++) {
                            echo '<tr>';
                                for ($j = 0; $j < 12; $j++) {
                                    echo '<td></td>';
                                }
                            echo '</tr>';
                        }
                        ?>
                    </table>
                </div>

        <?php   break;

                //Grille de 20*20
                case 20: ?> 

                <div id="grille_20" class="grille">
                    <table>
                        <caption>Niveau : Impossible</caption>

                        <?php 
                        for ($i = 0; $i < 20; $i++) {
                            echo '<tr>';
                                for ($j = 0; $j < 20; $j++) {
                                    echo '<td></td>';
                                }
                            echo '</tr>';
                        }
                        ?>
                    </table>
                </div>

    <?php   }
            
            ?>

            <!--Fin de la grille-->

            <!--Début de la partie chat-->

        <div id="chat">
        <br id="chatancre"> <!-- Ancre pour le tchat -->

            <div id="chat_title">

                <img src="assets/images/bot_avatar.png" alt="bot" width="50">
                <p>Chat Général Anonyme </p>

            </div>








                                <!-- STORY DE FLORIAN -->

            <div id="messages_area">
                <div id="message">


                                <!-- 1ER MESSAGE DE USER -->
            
                <!-- CHAT -->
                <div id="flex_user_message">
                    <div id="user_message">
                    </div> <br>
                </div>
                

    
                <!-- CHAT -->



                </div>
            </div>

                






            <div id="message_input">

                <form action="AjaxMessages.php?task=write" method="POST">
                    <input type="text" minlength="3" name="message1" id="message1" placeholder="Votre message...">
                    <button type="submit">Envoyer</button>
                </form>

            </div>

            </div>


            <!--Fin de la partie chat-->

                                        <!-- STORY DE FLORIAN -->





            </div>

        <!--Début des stats de jeu-->

        <div id="game_stats">


            <div id="turn">
            
                Tour : 0

            </div>

            <div id="time">
            
                Temps : 0 sec

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
        <script src="assets/JS/memory.js"></script>
        <?php

        include_once 'view/footer.inc.php';
        ?>
        <!--Fin du footer-->

    </div>
    
</body>
</html>