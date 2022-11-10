<?php 
require_once 'includes/database.inc.php'
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/CSS/scores.css">
    <link rel="shortcut icon" href="assets/images/icone.png" type="image/x-icon">
    <title>Scores</title>
</head>
<body>
    
    <div id="mainblock">

        <!--Début du header avec l'image de fond-->

        <div id="bg_image">
        <?php
            include_once 'view/header.inc.php'
            ?>

            <!--Fin du header-->

            <!--Début de l'intro-->

            <div id="intro">

            <h1>Tableau des scores</h1>

            <p>Venez vous comparer aux meilleurs !</p>
        
            </div>

        </div>

            <!--Fin de l'intro-->

            <!--Début du tableau-->

            <div id="center_part">

                <div class="side">
                    
                </div>

                <div id="tables">

<!--                    <table>
                        <thead>
                            <tr id="head">
                                <th><h2>Classement</h2></th>
                                <th><h2>Nom du Jeu</h2></th>
                                <th><h2>Pseudo</h2></th>
                                <th><h2>Difficulté</h2></th>
                                <th><h2>Score</h2></th>
                                <th><h2>Date et heure</h2></th>
                            </tr>
                    </thead>

                    <tbody>
                        <tr id="first" class="podium">
                            <th>1</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr id="second" class="podium">
                            <th>2</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr id="third" class="podium">
                            <th>3</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr class="even">
                            <th>4</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr class="odd">
                            <th>5</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr class="even">
                            <th>6</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr class="odd">
                            <th>7</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr class="even">
                            <th>8</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr class="odd">
                            <th>9</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr class="even">
                            <th>10</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </tbody>
                    
                    <tfoot>
                        <tr id="user_row">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tfoot>

                    </table> -->
                    
                    <table id="what">
                        <tr>
                            <th class="classement">Classement</th>
                            <th class="gamename">Nom du Jeu</th>
                            <th class="pseudo">Pseudo</th>
                            <th class="difficulty">Difficulté</th>
                            <th class="score">Score</th>
                            <th class="datetime">Date et Heure</th>
                        </tr>
                    </table>

                    <?php
                        $classement = 1;

                        $requete = 'SELECT `game`.`game_name`, `user`.pseudo, `difficulty`.`level`, `score` FROM `score` INNER JOIN `user` INNER JOIN `game` INNER JOIN difficulty ON score.id_user=user.id AND score.id_game=game.id AND score.id_difficulty=difficulty.id ORDER BY id_game, id_difficulty DESC, score DESC';
                        $previous = $mysqlClient->prepare($requete);
                        $previous->execute();
                        $result = $previous->fetchAll();
                        foreach ($result as $case) { ?>

                        <table 
                        <?php 
                        
                        switch ($classement) {
                            case 1 : ?>
                                id="first" class="podium"
                    <?php       break;     
                            case 2 : ?>
                                id="second" class="podium"
                    <?php       break;
                            case 3 : ?>
                                id="third" class="podium"
                    <?php       break;
                            default : ?>
                                class="therest"
                    <?php       break;
                                
                        }
                        
                        ?>>
                            <tr>
                                <td class="classement"><?php echo $classement; $classement++; ?></td>
                                <td class="gamename"><?php echo $case['game_name']; ?></td>
                                <td class="pseudo"><?php echo $case['pseudo']; ?></td>
                                <td class="difficulty"><?php echo $case['level']; ?></td>
                                <td class="score"><?php echo $case['score']; ?></td>
                                <td class="datetime"><?php// echo $case['datetime']; ?></td>
                            </tr>
                        </table>

                    <?php
                        }
                    ?>

                    <table id="me" class="podium">
                        <tr>
                            <td class="classement"></td>
                            <td class="gamename"></td>
                            <td class="pseudo"></td>
                            <td class="difficulty"></td>
                            <td class="score"></td>
                            <td class="datetime"></td>
                        </tr>
                    </table>

                </div>

                

                <div class="side">
                    
                </div>
        
            </div>

            <!--Fin du tableau-->

            <?php

        include_once 'view/footer.inc.php';
        ?>
    
            <!--Fin du footer-->


    </div>

</body>
</html>