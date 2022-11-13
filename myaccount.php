<?php 
$pdo=require_once 'includes/database.inc.php';
session_start();
$DB = new PDO('mysql:host=localhost;dbname=puissance4;charset=utf8', 'root', 'root');
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




                                <!-- PHP POUR LA MODIFICATION DE L'EMAIL -->

                                <?php 
$error = false;

if (isset($_POST['new_mail'])) {
    // ici on a bien recu des donnees d'un formulaire

    // on verifie donc l'adresse email
    if (filter_var($_POST['new_mail'], FILTER_VALIDATE_EMAIL) !== false) {
        // l'email est valide donc je cree les variables 

        $new_mail = $_POST['new_mail'];
        $password = $_POST['mdp'];
        $old_mail = $_POST['old_mail'];

    }
    else {
        // Si l'email n'est pas valide renvoie $error
        $error = 'Email invalide';
    }
}

if (isset($new_mail)) 
{ 
    // Vérification du $old_mail dans la base de donnée
    // SI email reconnue a celui dans une base de donnée renvoie l'id de l'user lié a cette email
    // SI email non reconnue dans la base de donnée renvoie rien
    $requete_om = 'SELECT id 
                FROM user 
                WHERE email= :old_mail';
    $bdd_mail = $mysqlClient->prepare($requete_om);
    $bdd_mail->execute(['old_mail' => $old_mail]);
    $bdd_mail = $bdd_mail->fetch();



        // Vérification du $password dans la base de donnée
    // SI mot de passe reconnue a celui dans une base de donnée renvoie l'id de l'user lié a cette email
    // SI mot de passe non reconnue dans la base de donnée renvoie rien
    $requete_pw = 'SELECT id 
                FROM user 
                WHERE password= :mdp';
    $bdd_password = $mysqlClient->prepare($requete_pw);
    $bdd_password->execute(['mdp' => $password]);
    $bdd_password = $bdd_password->fetch();




    if ($bdd_mail != NULL && $bdd_password != NULL ){ // SI email et mot de passe trouvé 



        $DB = new PDO('mysql:host=localhost;dbname=puissance4;charset=utf8', 'root', 'root');

        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data = [
            'new_mail' => $new_mail,
            'mdp' => $password,

 
        ];
        $sql = "UPDATE user SET email=:new_mail WHERE password=:mdp";
        $stmt= $DB->prepare($sql);
        $stmt->execute($data);
        echo '<p class="style_css">Modification effectuée</p>'.'<br>';

    }


                // Erreurs
    elseif ($bdd_mail != NULL && $bdd_password == NULL) { // SI email trouvé mais mot de passe inexistant
        echo '<p class="style_css">Mot de passe invalide</p>';
    }
    elseif ($bdd_mail == NULL && $bdd_password != NULL) { // SI mot de passe trouvé mais email inexistant
        echo '<p class="style_css">Email invalide</p>';
    }
    else { // SI email et mot de passe inexistant
        echo '<p class="style_css">Mot de passe et email inexistant</p>';
    }




       //} if ($bdd_mail != 'old_mail'){
        // ($bdd_mail != NULL  && $_SESSION["user"]["id"] == $bdd_mail["id"])
          //  echo ("PTN C BON");
         //   $_SESSION['user']["email"] = $_POST['new_mail'];
}

elseif($error !== false) {
        echo "<p>$error</p>";
}
    ?>

    
                                <!-- PHP POUR LA MODIFICATION DE L'EMAIL -->





    </form>
    <div id="form"> <!-- Début du Formulaire de modification d'email-->
        <h4 id="edit_info">Modifier votre adresse mail</h4>
        <form method="POST" action="myaccount.php" class="form">
            <input type="text" class="old_edit" name="old_mail" placeholder="Ancienne adresse mail"><br><br> <!-- Zone de texte "Ancienne adresse mail" -->
            <input type="text" class="new_edit" name="new_mail" placeholder="Nouvelle adresse mail"><br><br> <!-- Zone de texte "Nouvelle adresse mail" -->
            <input type="password" class="security_edit" name="mdp"      placeholder="Mot de passe"></textarea><br><br> <!-- Zone de texte "Mot de passe" -->
            <button type="submit" name="submit" id="bouton_connexion" value="envoyer"> Envoyer </button> <!-- Bouton Envoyer -->
        </form>
    </div> <!-- Fin du Formulaire de modification d'email-->




    <br>
    <br id="edit_password"> <!-- Ancre pour la modification du mot de passe -->
    <br>
    <br>




                                    <!-- PHP POUR LA MODIFICATION DU MOT DE PASSE -->

<?php 
$error = false;



if (isset($_POST['new_mdp'])) 
{ 
    $new_password = $_POST['new_mdp'];
    $mail = $_POST['mail'];
    $old_password = $_POST['old_mdp'];
    // Vérification du $old_mail dans la base de donnée
    // SI email reconnue a celui dans une base de donnée renvoie l'id de l'user lié a cette email
    // SI email non reconnue dans la base de donnée renvoie rien
    $requete_pw = 'SELECT id 
                FROM user 
                WHERE password= :old_mdp';
    $bdd_mdp = $mysqlClient->prepare($requete_pw);
    $bdd_mdp->execute(['old_mdp' => $old_password]);
    $bdd_mdp = $bdd_mdp->fetch();



        // Vérification du $password dans la base de donnée
    // SI mot de passe reconnue a celui dans une base de donnée renvoie l'id de l'user lié a cette email
    // SI mot de passe non reconnue dans la base de donnée renvoie rien
    $requete_om = 'SELECT id 
                FROM user 
                WHERE email= :mail';
    $bdd_mail = $mysqlClient->prepare($requete_om);
    $bdd_mail->execute(['mail' => $mail]);
    $bdd_mail = $bdd_mail->fetch();





    if ($bdd_mail != NULL && $bdd_mdp != NULL ){ // SI email et mot de passe trouvé 



        $DB = new PDO('mysql:host=localhost;dbname=puissance4;charset=utf8', 'root', 'root');

        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data = [
            'new_mdp' => $new_password,
            'mail' => $mail,

 
        ];
        $sql = "UPDATE user SET password=:new_mdp WHERE email=:mail";
        $stmt= $DB->prepare($sql);
        $stmt->execute($data);
        echo '<p class="style_css">Modification effectuée</p>'.'<br>';

    }


                // Erreurs
    elseif ($bdd_mail != NULL && $bdd_mdp == NULL) { // SI email trouvé mais mot de passe inexistant
        echo '<p class="style_css">Mot de passe invalide</p>';
    }
    elseif ($bdd_mail == NULL && $bdd_mdp != NULL) { // SI mot de passe trouvé mais email inexistant
        echo '<p class="style_css">Email invalide</p>';
    }
    else { // SI email et mot de passe inexistant
        echo '<p class="style_css">Mot de passe et email inexistant</p>';
    }




       //} if ($bdd_mail != 'old_mail'){
        // ($bdd_mail != NULL  && $_SESSION["user"]["id"] == $bdd_mail["id"])
          //  echo ("PTN C BON");
         //   $_SESSION['user']["email"] = $_POST['new_mail'];
}

elseif($error !== false) {
        echo "<p>$error</p>";
}
    ?>

    
                                <!-- PHP POUR LA MODIFICATION DU MOT DE PASSE -->




    <div id="form"> <!-- Début du Formulaire de modification de mot de passe-->
        <h4 id="edit_info">Modifier votre mot de passe</h4>
        <form method="POST" class="form">
            <input type="text" class="old_edit" name="old_mdp" placeholder="Ancien mot de passe"><br><br> <!-- Zone de texte "Ancien mot de passe" -->
            <input type="text" class="new_edit" name="new_mdp" placeholder="Nouveau mot de passe"><br><br> <!-- Zone de texte "Nouveau mot de passe" -->
            <input type="text" class="security_edit" name="mail" placeholder="Votre adresse mail"></textarea><br><br> <!-- Zone de texte "Votre adresse mail" -->
            <button id="bouton_connexion"> Envoyer </button> <!-- Bouton Envoyer -->
        </form>
    </div> <!-- Fin du Formulaire de modification de mot de passe-->









    <?php

include_once 'view/footer.inc.php';
?><!-- Fin du Footer-->


    </div> <!-- Fin de la div Body-->
</body>
</html>