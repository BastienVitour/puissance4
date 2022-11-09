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
                    
                    <table id="first" class="podium">
                        <tr>
                            <td class="classement">1</td>
                            <td class="gamename"></td>
                            <td class="pseudo"></td>
                            <td class="difficulty"></td>
                            <td class="score"></td>
                            <td class="datetime"></td>
                        </tr>
                    </table>

                    <table id="second" class="podium">
                        <tr>
                            <td class="classement">2</td>
                            <td class="gamename">The Power Of Memory</td>
                            <td class="pseudo">Basvit</td>
                            <td class="difficulty">Intermédiaire</td>
                            <td class="score">345</td>
                            <td class="datetime">05/11/2022 09:40</td>
                        </tr>
                    </table>

                    <table id="third" class="podium">
                        <tr>
                            <td class="classement">3</td>
                            <td class="gamename"></td>
                            <td class="pseudo"></td>
                            <td class="difficulty"></td>
                            <td class="score"></td>
                            <td class="datetime"></td>
                        </tr>
                    </table>

                    <table class="therest">
                        <tr>
                            <td class="classement">4</td>
                            <td class="gamename"></td>
                            <td class="pseudo"></td>
                            <td class="difficulty"></td>
                            <td class="score"></td>
                            <td class="datetime"></td>
                        </tr>
                    </table>

                    <table class="therest">
                        <tr>
                            <td class="classement">5</td>
                            <td class="gamename"></td>
                            <td class="pseudo"></td>
                            <td class="difficulty"></td>
                            <td class="score"></td>
                            <td class="datetime"></td>
                        </tr>
                    </table>

                    <table class="therest">
                        <tr>
                            <td class="classement">6</td>
                            <td class="gamename"></td>
                            <td class="pseudo"></td>
                            <td class="difficulty"></td>
                            <td class="score"></td>
                            <td class="datetime"></td>
                        </tr>
                    </table>

                    <table class="therest">
                        <tr>
                            <td class="classement">7</td>
                            <td class="gamename"></td>
                            <td class="pseudo"></td>
                            <td class="difficulty"></td>
                            <td class="score"></td>
                            <td class="datetime"></td>
                        </tr>
                    </table>

                    <table class="therest">
                        <tr>
                            <td class="classement">8</td>
                            <td class="gamename"></td>
                            <td class="pseudo"></td>
                            <td class="difficulty"></td>
                            <td class="score"></td>
                            <td class="datetime"></td>
                        </tr>
                    </table>

                    <table class="therest">
                        <tr>
                            <td class="classement">9</td>
                            <td class="gamename"></td>
                            <td class="pseudo"></td>
                            <td class="difficulty"></td>
                            <td class="score"></td>
                            <td class="datetime"></td>
                        </tr>
                    </table>

                    <table class="therest">
                        <tr>
                            <td class="classement">10</td>
                            <td class="gamename"></td>
                            <td class="pseudo">Sylvian</td>
                            <td class="difficulty"></td>
                            <td class="score"></td>
                            <td class="datetime"></td>
                        </tr>
                    </table>

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