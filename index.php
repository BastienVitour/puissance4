
<?php 
require_once 'includes/database.inc.php'
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Accueil</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/CSS/accueil.css'>
    <link rel="shortcut icon" href="assets/images/icone.png" type="image/x-icon">
    <script src='main.js'></script>
</head>
<body>

    <div id="mainblock">

        <!--Début du header avec l'image de fond-->

        <div id="bg_image">
            <?php 

            include_once 'view/header.inc.php';
            ?>

            <!--Fin du header-->

            <!--Début de la partie welcome-->


            <div id="welcome">

            <h1>BIENVENUE DANS <br> NOTRE STUDIO !</h1>

            <p>Venez challenger les cerveaux les plus agiles !</p>

            <a href="memory.php"><button>JOUER !</button></a>

            </div>
        </div>

        <!--Fin de la partie welcome et de l'image de fond-->

        <div id="presentation">

            <h2>Venez jouez à l'un des grands classiques des jeux de société : le Mémory ! </h2>

            <h3>Ce jeu mettra à l'épreuve</h3>

            <table>
                <tr>
                    <td>Votre Mémoire</td>
                    <td>Votre sens de l'Observation</td>
                    <td>Votre Ténacité</td>
                </tr>
                <tr>
                    <td><img src="assets/images/memory_photo.jpeg" alt="" width="400"></td>
                    <td><img src="assets/images/observation.jpeg" alt=""></td>
                    <td><img src="assets/images/tenacity.jpeg" alt="" width="220"></td>
                </tr>
            </table>
    
        </div>

        <!--Début de la partie stats-->

        <div id="stats">

            <div id="memorimage">
                <img src="assets/images/people_gaming.jpeg" width="700">
            </div>

            <div id="numbers">

                <div id="left">

                    <div id="num_games">
                    <p>XXX <br> Parties Jouées</p>
                    </div>

                    <div id="best_time">
                    <p>XX sec <br> Temps Record</p>
                    </div>
            
                </div>

                <div id="right">

                    <div id="connected_players">
                    <p>XXXX <br> Joueurs Connectés</p>
                    </div>

                    <div id="registered_players">
                    <p>XXXX <br> Joueurs Inscrits</p>
                    </div>

                </div>
            </div>

        </div>

        <!--Fin de la partie stats-->

        <!--Début de la partie invitation-->

        <div id="invitation">

            <div id="login">

                Pour pouvoir jouer à <span id="power_memo">The Power Of Memory</span>, vous devrez vous <a href="login.php">connecter à votre compte.</a>
            
            </div>

            <div id="register_invit">

                Si vous n'avez pas de compte, <a href="register.php"> inscrivez vous</a> !
            
            </div>
       
        </div>

        <!--Fin de la partie invitation-->

        <!--Début de la partie team-->

        <div id="team">

            <h2>Notre Équipe</h2>

            <div id="team_members">
                <p class="member">
                    <img src="assets/images/sylvian.jpg" alt="Sylvian" width="150"> <br>
                    Sylvian <br>
                    Scrum Master
                </p>

                <p class="member">
                    <img src="assets/images/bastien.jpg" alt="Bastien" width="150"> <br>
                    Bastien <br>
                    Développeur
                </p>

                <p class="member">
                    <img src="assets/images/florian.jpg" alt="Florian" width="150"> <br>
                    Florian <br>
                    Développeur
                </p>
            </div>

        </div>

        <!--Fin de la partie team-->

        <!--Début du footer-->

        <?php

        include_once 'view/footer.inc.php';
        ?>

        <!--Fin du footer-->
        
    </div>

</body>
</html>