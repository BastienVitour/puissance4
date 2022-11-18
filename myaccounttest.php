<?php 
$pdo=require_once 'includes/database.inc.php';
session_start();
$DB = new PDO('mysql:host=localhost;dbname=puissance4;charset=utf8', 'root', 'root');

?>
<!DOCTYPE html>
<html>

<?php
$_SESSION['user_id'] = 3;
            if (isset($_SESSION['user_id'])) {
                echo $_SESSION['user_id'];
                $button_link = 'memory.php';
            }
            else {
                $button_link = 'login.php';
            }
$id_user = $_SESSION['user_id'];

$rien_performance = false;
$rien_temps = false;

$rien_facile = false;
$rien_moyen = false;
$rien_expert = false;
$rien_impossible = false;

?>




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




            <!-- PHP PROFIL -->
<?php
    $requete_pseudo = "SELECT * FROM user WHERE id='$id_user'";
    $pseudo = $mysqlClient->prepare($requete_pseudo);
    $pseudo->execute();
    $pseudo = $pseudo->fetchAll();
    foreach ($pseudo as $name) {
    }
    $name = $name['pseudo'];
?>
            <!-- PHP PROFIL -->

            




            <!-- PHP DATE INSCRIPTION  -->
            <?php
    $requete_date_inscription = "SELECT date_inscription FROM user WHERE id='$id_user'";
    $date_inscription = $mysqlClient->prepare($requete_date_inscription);
    $date_inscription->execute();
    $date_inscription = $date_inscription->fetchAll();
    foreach ($date_inscription as $date_login) {
    }
    $date_login=$date_login['date_inscription'];

    $date_login= new DateTime($date_login);
    $date_login = $date_login->format('j F Y');
?>
            <!-- PHP DATE INSCRIPTION -->







            <!-- PHP MEILLEUR SCORE  -->
<?php
    $best_score=NULL;

    $requete_meilleur_score = "SELECT score FROM score WHERE `score`.`id_user`='$id_user'ORDER BY `score`.`id_difficulty` ASC, `score`.`score` DESC";
    $meilleur_score = $mysqlClient->prepare($requete_meilleur_score);
    $meilleur_score->execute();
    $meilleur_score = $meilleur_score->fetchAll();
    foreach ($meilleur_score as $best_score) {
    }
    if ($best_score === NULL){
        $best_score = 'X';
        $rien_performance = true;
    } else {
        $best_score=$best_score['score'];
    }
?>
            <!-- PHP MEILLEUR SCORE -->
            <!-- PHP MEILLEUR SCORE DIFFICULTE  -->
<?php
        $best_score_diff=NULL;

        $DB_best_score = new PDO('mysql:host=localhost;dbname=puissance4;charset=utf8', 'root', 'root');

        $DB_best_score->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data_best_score = [
            'best_score' => $best_score,

 
        ];
        $sqlbs = "SELECT id_difficulty , difficulty.level AS `level`  
                  FROM score  
                  INNER JOIN difficulty ON score.id_difficulty = difficulty.id
                  WHERE score = :best_score
                  AND `score`.`id_user`='$id_user'";
        $stmtbs= $DB->prepare($sqlbs);
        $stmtbs->execute($data_best_score);



    $stmtbs = $stmtbs->fetchAll();
    foreach ($stmtbs as $best_score_diff) {
    }
    if ($best_score_diff === NULL){
        $best_score_diff = 'X';
        $rien_performance = true;
    } else {
        $best_score_diff=$best_score_diff['level'];
    } 
?>
            <!-- PHP MEILLEUR SCORE DIFFICULTE -->







            <!-- PHP MEILLEUR TEMPS  -->
<?php
    $best_time=NULL;

    $requete_meilleur_temps = "SELECT score FROM score WHERE `score`.`id_user`='$id_user' ORDER BY `score`.`score` DESC";
    $meilleur_temps = $mysqlClient->prepare($requete_meilleur_temps);
    $meilleur_temps->execute();
    $meilleur_temps = $meilleur_temps->fetchAll();
    foreach ($meilleur_temps as $best_time) {
    }
    if ($best_time === NULL){
        $best_time = 'X';
        $rien_temps = true;
    } else {
        $best_time=$best_time['score'];
    }
?>
            <!-- PHP MEILLEUR TEMPS -->
            <!-- PHP MEILLEUR TEMPS DIFFICULTE  -->
<?php
        $best_time_diff = NULL;
        $DB_best_time = new PDO('mysql:host=localhost;dbname=puissance4;charset=utf8', 'root', 'root');

        $DB_best_time->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data_best_time = [
            'best_time' => $best_time,

 
        ];
        $sqlbt = "SELECT id_difficulty , difficulty.level AS `level`  
                  FROM score  
                  INNER JOIN difficulty ON score.id_difficulty = difficulty.id
                  WHERE score = :best_time
                  AND `score`.`id_user`='$id_user'";
        $stmtbt= $DB->prepare($sqlbt);
        $stmtbt->execute($data_best_time);



    $stmtbt = $stmtbt->fetchAll();
    foreach ($stmtbt as $best_time_diff) {
    }
    if ($best_time_diff === NULL){
        $best_time_diff = 'X';
        $rien_temps = true;
    } else {
        $best_time_diff=$best_time_diff['level'];
    }
?>
            <!-- PHP MEILLEUR TEMPS DIFFICULTE -->







            <!-- PHP PARTIES JOUEES TOTAL -->
<?php
$dbpj = new PDO('mysql:host=localhost;dbname=puissance4;charset=utf8', 'root', 'root');

$dbpj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$Sqlpj = "SELECT count(*) as `total` FROM score WHERE `score`.`id_user`='$id_user'";
$stmtpj = $dbpj->query($Sqlpj);
$stmtpj->execute();
$totalpj = $stmtpj->fetchAll();
foreach ($totalpj as $played_total) {
}
$played_total=$played_total['total'];

?>
            <!-- PHP PARTIES JOUEES TOTAL -->








    <div id="profil"> <!-- Début du profil-->
        <div id="profil_avatar"> <!-- Photo de profil-->
            <img alt="Avatar" src="https://cdn1.epicgames.com/epic/offer/WatchDogs2_PortraitPromo-1280x1420-8ef789a7185a709178f51c0e9d42ee9a.jpg" id="avatar">
            </a>
        </div>
        <div id="profil_data"> <!-- Information du profil-->

                <!-- PSEUDO -->
        <h4 class="name_css"><?= $name; ?> </h4>
                <!-- PSEUDO -->

                <!-- DATE INSCRIPTION -->
        <p class="style_css"> Inscrit le <?= $date_login; ?>
                <!-- DATE INSCRIPTION -->
            <br>
            <br>
            <br>
            <br>
            <br>
        <!-- MEILLEUR SCORE -->
        <?php
            if ($rien_performance === false){ ?>
                <br><p class="style_css"> Meilleur performance : <?= $best_score; ?> s en difficulté <?=$best_score_diff; ?>
            <?php } else { ?>
                <br><p class="style_css"> Vous n'avez aucune performance 
        <?php } ?>
        <!-- MEILLEUR SCORE -->

        <!-- MEILLEUR TEMPS -->
        <?php
            if ($rien_temps === false){ ?>
                <br><p class="style_css"> Meilleur temps : <?= $best_time; ?> s en difficulté <?=$best_time_diff; ?>
            <?php } else { ?>
                <br><p class="style_css"> Vous n'avez aucun temps
        <?php } ?>
        <!-- MEILLEUR TEMPS -->

        <!-- PARTIES JOUEES -->
        <?php
            if ($rien_temps === false){ ?>
                <br><p class="style_css"> Total de parties jouées : <?= $played_total; ?> parties
            <?php } else { ?>
                <br><p class="style_css"> Vous avez joué aucune partie
        <?php } ?>
        <!-- PARTIES JOUEES -->
        </div>
    </div> <!-- Fin du profil-->
















    <div id="game_stats"> <!-- Début des scores des niveaux de jeu -->
        


                <!-- PHP MEILLEUR TEMPS FACILE -->
<?php
$best_time_easy = NULL;

$requete_meilleur_temps_facile = "SELECT * FROM `score` WHERE `id_difficulty` = 1 AND `score`.`id_user`='$id_user' ORDER BY `score`.`score` DESC";
$meilleur_temps_facile = $mysqlClient->prepare($requete_meilleur_temps_facile);
$meilleur_temps_facile->execute();
$meilleur_temps_facile = $meilleur_temps_facile->fetchAll();
foreach ($meilleur_temps_facile as $best_time_easy) {
}
if ($best_time_easy === NULL){
    $best_time_easy = 'X';
    $rien_facile = true;
} else {
    $best_time_easy=$best_time_easy['score'];
}?>
                <!-- PHP MEILLEUR TEMPS FACILE -->
                <!-- PHP PARTIES JOUEES FACILE -->
<?php
$dbpj = new PDO('mysql:host=localhost;dbname=puissance4;charset=utf8', 'root', 'root');

$dbpj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$Sqlpj = "SELECT count(*) as `total` FROM score WHERE `id_difficulty` = 1 AND `score`.`id_user`='$id_user' ";
$stmtpj = $dbpj->query($Sqlpj);
$stmtpj->execute();
$totalpj = $stmtpj->fetchAll();
foreach ($totalpj as $played_easy) {
}
$played_easy=$played_easy['total'];

?>
                <!-- PHP PARTIES JOUEES FACILE -->


        <div id="facile"> <!-- Niveau facile -->
            <a href="memory.php">
            <img alt="easy" src="assets/images/facile.jpeg" id="easy"></a>
            <p id="pl">Facile</p>
            <?php
            if ($rien_facile === false){ ?>
                <br><p class="style_css"> Joué : <?= $played_easy; ?> parties
                <br><p class="style_css"> Meilleurs temps : <?= $best_time_easy; ?> secondes
            <?php } else { ?>
                <br><p class="style_css"> Vous avez joué aucune partie
                <br><p class="style_css"> Vous n'avez aucun temps
            <?php } ?>







                <!-- PHP MEILLEUR TEMPS MOYEN -->
<?php
$best_time_medium = NULL;

$requete_meilleur_temps_moyen = "SELECT * FROM `score` WHERE `id_difficulty` = 2 AND `score`.`id_user`='$id_user' ORDER BY `score`.`score` DESC";
$meilleur_temps_moyen = $mysqlClient->prepare($requete_meilleur_temps_moyen);
$meilleur_temps_moyen->execute();
$meilleur_temps_moyen = $meilleur_temps_moyen->fetchAll();
foreach ($meilleur_temps_moyen as $best_time_medium) {
}
if ($best_time_medium === NULL){
    $best_time_medium = 'X';
    $rien_moyen = true;
} else {
    $best_time_medium=$best_time_medium['score'];
}?>
                <!-- PHP MEILLEUR TEMPS MOYEN -->
                <!-- PHP PARTIES JOUEES MOYEN -->
<?php
$dbpj = new PDO('mysql:host=localhost;dbname=puissance4;charset=utf8', 'root', 'root');

$dbpj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$Sqlpj = "SELECT count(*) as `total` FROM score WHERE `id_difficulty` = 2 AND `score`.`id_user`='$id_user' ";
$stmtpj = $dbpj->query($Sqlpj);
$stmtpj->execute();
$totalpj = $stmtpj->fetchAll();
foreach ($totalpj as $played_medium) {
}
$played_medium=$played_medium['total'];

?>
                <!-- PHP PARTIES JOUEES MOYEN -->


        </div>
        <div id="intermediaire"> <!-- Niveau intermédiaire --> 
            <a href="memory.php">
            <img alt="medium" src="assets/images/medium.jpeg" id="medium"></a>
            <p id="pl">Intermédiaire</p>
            <?php
            if ($rien_moyen === false){ ?>
                <br><p class="style_css"> Joué : <?= $played_medium; ?> parties
                <br><p class="style_css"> Meilleurs temps : <?= $played_medium; ?> secondes
            <?php } else { ?>
                <br><p class="style_css"> Vous avez joué aucune partie
                <br><p class="style_css"> Vous n'avez aucun temps
            <?php } ?>







                <!-- PHP MEILLEUR TEMPS EXPERT -->
<?php
$best_time_expert = NULL;
$requete_meilleur_temps_expert = "SELECT * FROM `score` WHERE `id_difficulty` = 3 AND `score`.`id_user`='$id_user' ORDER BY `score`.`score` DESC";
$meilleur_temps_expert = $mysqlClient->prepare($requete_meilleur_temps_expert);
$meilleur_temps_expert->execute();
$meilleur_temps_expert = $meilleur_temps_expert->fetchAll();
foreach ($meilleur_temps_expert as $best_time_expert) {
}
if ($best_time_expert === NULL){
    $best_time_expert = 'X';
    $rien_expert = true;
} else {
    $best_time_expert=$best_time_expert['score'];
}?>
                <!-- PHP MEILLEUR TEMPS EXPERT -->
                <!-- PHP PARTIES JOUEES EXPERT -->
<?php
$dbpj = new PDO('mysql:host=localhost;dbname=puissance4;charset=utf8', 'root', 'root');

$dbpj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$Sqlpj = "SELECT count(*) as `total` FROM score WHERE `id_difficulty` = 3 AND `score`.`id_user`='$id_user'";
$stmtpj = $dbpj->query($Sqlpj);
$stmtpj->execute();
$totalpj = $stmtpj->fetchAll();
foreach ($totalpj as $played_expert) {
}
$played_expert=$played_expert['total'];

?>
                <!-- PHP PARTIES JOUEES EXPERT -->

        </div>
        <div id="expert"> <!-- Niveau expert -->
            <a href="memory.php">
            <img alt="expert" src="assets/images/expert.jpeg" id="expert"></a>
            <p id="pl">Expert</p>
            <?php
            if ($rien_expert === false){ ?>
                <br><p class="style_css"> Joué : <?= $played_expert; ?> parties
                <br><p class="style_css"> Meilleurs temps : <?= $best_time_expert; ?> secondes
            <?php } else { ?>
                <br><p class="style_css"> Vous avez joué aucune partie
                <br><p class="style_css"> Vous n'avez aucun temps
            <?php } ?>









                <!-- PHP MEILLEUR TEMPS IMPOSSIBLE -->
                <?php
$best_time_impossible=NULL;
$requete_meilleur_temps_expert = "SELECT * FROM `score` WHERE `id_difficulty` = 4 AND `score`.`id_user`='$id_user' ORDER BY `score`.`score` DESC";
$meilleur_temps_expert = $mysqlClient->prepare($requete_meilleur_temps_expert);
$meilleur_temps_expert->execute();
$meilleur_temps_expert = $meilleur_temps_expert->fetchAll();
foreach ($meilleur_temps_expert as $best_time_impossible) {
}


if ($best_time_impossible === NULL){
    $best_time_impossible = 'X';
    $rien_impossible = true;
} else {
    $best_time_impossible=$best_time_impossible['score'];
}

?>
                <!-- PHP MEILLEUR TEMPS IMPOSSIBLE -->
                <!-- PHP PARTIES JOUEES IMPOSSIBLE -->
<?php
$dbpj = new PDO('mysql:host=localhost;dbname=puissance4;charset=utf8', 'root', 'root');

$dbpj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$Sqlpj = "SELECT count(*) as `total` FROM score WHERE `id_difficulty` = 4 AND `score`.`id_user`='$id_user'";
$stmtpj = $dbpj->query($Sqlpj);
$stmtpj->execute();
$totalpj = $stmtpj->fetchAll();
foreach ($totalpj as $played_impossible) {
}
$played_impossible=$played_impossible['total'];


?>
                <!-- PHP PARTIES JOUEES IMPOSSIBLE -->
        </div>
        <div id="impossible"> <!-- Niveau impossible -->     
            <a href="memory.php">
            <img alt="impossible" src="assets/images/impossible.jpeg" id="impossible"></a>
            <p id="pl">Impossible</p> 
            <?php
            if ($rien_impossible === false){ ?>
                <br><p class="style_css"> Joué : <?= $played_impossible; ?> parties
                <br><p class="style_css"> Meilleurs temps : <?= $best_time_impossible; ?> secondes
            <?php } else { ?>
                <br><p class="style_css"> Vous avez joué aucune partie
                <br><p class="style_css"> Vous n'avez aucun temps
            <?php } ?>
            
        
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
if (isset($new_mail)){
    // On vérifit que le mail est disponible

    $email = $_POST['new_mail'];
    $stmt = $DB->prepare("SELECT email FROM user WHERE email='$email'");
    $stmt->execute([$email]); 
    $user = $stmt->fetch();
    if ($user) {
    $valid=false;
    $er_mail = "Le mail est deja utilisé";
    $new_mail=null;
    echo "<p class='style_css'>.$er_mail.<p>";
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
    $passwordhash= hash('sha256',$password);
    $requete_pw = 'SELECT id 
                FROM user 
                WHERE password= :mdp';
    $bdd_password = $mysqlClient->prepare($requete_pw);
    $bdd_password->execute(['mdp' => $passwordhash]);
    $bdd_password = $bdd_password->fetch();




    if ($bdd_mail != NULL && $bdd_password != NULL ){ // SI email et mot de passe trouvé 



        $DB = new PDO('mysql:host=localhost;dbname=puissance4;charset=utf8', 'root', 'root');

        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data = [
            'new_mail' => $new_mail,
            'mdp' => $passwordhash,

 
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
    }else { // SI email et mot de passe inexistant
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
        <form method="POST"  action="#edit_mail" class="form">
            <input type="text" class="old_edit" name="old_mail" placeholder="Ancienne adresse mail"><br><br> <!-- Zone de texte "Ancienne adresse mail" -->
            <input type="text" class="new_edit" name="new_mail" placeholder="Nouvelle adresse mail"><br><br> <!-- Zone de texte "Nouvelle adresse mail" -->
            <input type="password" class="security_edit" name="mdp"      placeholder="Mot de passe"></textarea><br><br> <!-- Zone de texte "Mot de passe" -->
            <button type="submit" name="submit" id="bouton_connexion" value="envoyer" > Envoyer </button> <!-- Bouton Envoyer -->

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
    $passwordhash= hash('sha256',$old_password);
    // Vérification du $old_mail dans la base de donnée
    // SI email reconnue a celui dans une base de donnée renvoie l'id de l'user lié a cette email
    // SI email non reconnue dans la base de donnée renvoie rien
    $requete_pw = 'SELECT id 
                FROM user 
                WHERE password= :old_mdp';
    $bdd_mdp = $mysqlClient->prepare($requete_pw);
    $bdd_mdp->execute(['old_mdp' => $passwordhash]);
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
        $new_password= hash('sha256',$_POST['new_mdp']);
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
        <form method="POST"  action ="#edit_password"class="form">
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