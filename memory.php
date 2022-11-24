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
                        <option value="2">Animaux</option>
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
                if (isset($_GET['theme'])) {
                    $theme = $_GET['theme'];
                }
                else {
                    $theme = 0;
                }
                echo '<div id="theme_value">'.$theme.'</div>';

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
                        echo '<td class="memoryCase" id='.$case.'>
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

                <?php 

                $id = $_SESSION['user_id'];
                
                //On va récupérer les infos de la base de données
                //-->contenu du message, nom de l'utilisateur, date d'envoi du message, id de l'utilisateur, jour d'envoi du message
                $messages = $mysqlClient->prepare("SELECT `message`.`message`, user.pseudo, `message`.date_message, `message`.id_user, `message`.id_game, DAY(`message`.date_message) AS `day` 
                                                   FROM `message` INNER JOIN user 
                                                   ON `message`.id_user = '$id' 
                                                   WHERE (NOW()+0-date_message+0)<1000000 AND `message`.id_game=1 
                                                   ORDER BY `message`.date_message");
                $messages->execute();
                $messages = $messages->fetchAll();

                foreach ($messages as $message) {

                    $date = $message['date_message'];

                    //On formate la date pour respecter un meilleur format
                    $theDate = new DateTime($date);
                    $message_datetime = $theDate->format('H:i');

                    //echo $message['day'];
                    //echo date('d');
                    
                    //Si celui qui a envoyé le message est l'utilisateur actuel
                    if ($message['id_user'] == $_SESSION['user_id']) { ?>

                <div class="user_message">

                <!--Le nom de l'utilisateur-->
                    <div class="me">
                        <?php echo $message['pseudo'] ?>
                    </div>

                    <!--Le message de l'utilisateur-->
                    <div class="user_text">
                        <?php echo $message['message'] ?>
                    </div>

                    <!--La date/heure de l'envoi du message-->
                    <div class="user_message_date">
                        <?php
                        
                        //Si le message a été envoyé aujourd'hui
                        if ($message['day'] == date('d')) {
                        
                            echo 'Aujourd\'hui à '.$message_datetime; 
                            
                        } else {
                            echo 'Hier à '.$message_datetime;
                        }
                        
                        ?>
                    </div>

                </div>

                <?php } else { 
                    //Sinon si le message ne vient pas de l'utilisateur actuel
                    ?>

                <div class="others_message">

                    <div id="others_image">
                        <img src="assets/images/bot_avatar_whitesmoke.png" alt="others_avatar" width="50">
                    </div>

                    <div id="not_others_image">

                    <!--Le nom de l'utilisateur-->
                        <div class="other">
                            <?php echo $message['pseudo'] ?>
                        </div>

                        <!--Le message de l'utilisateur-->
                        <div class="others_text">
                            <?php echo $message['message'] ?>
                        </div>

                        <!--La date d'envoi du message-->
                        <div class="others_message_date">
                            <?php
                            //Si le message a été envoyé aujourd'hui
                            if ($message['day'] == date('d')) {
                        
                                echo 'Aujourd\'hui à '.$message_datetime; 
                                
                            } else {
                                echo 'Hier à '.$message_datetime;
                            } 
                            ?>
                        </div>
                
                    </div>

                </div>

                <?php }} ?>             

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

    <div id="winner">
        Vous avez gagné !
    </div>

    <script src="assets/JS/memory.js"></script>
    
</body>
</html>