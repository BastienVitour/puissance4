
<?php 
require_once 'includes/database.inc.php'
?>
<?php
session_start();
include('includes/database.inc.php');
$error = false;
 // S'il y a une session alors on ne retourne plus sur cette page
if (isset($_SESSION['id'])){
    header('Location: index.php');
    exit;
    }




if(!empty($_POST)){

    echo '<pre>';print_r($_POST);
    die('eeee');

 
     
    // On se place sur le bon formulaire grâce au "name" de la balise "input"
    if (isset($_POST['inscription'])){
        $pseudo= htmlentities(trim($prenom)); // on récupère le prénom
        $mail = htmlentities(strtolower(trim($mail))); // On récupère le mail
        $mdp = trim($mdp); // On récupère le mot de passe
        $confmdp = trim($confmdp); // On récupère la confirmation du mot de passe
     
                // Vérification du pseudo
        if(empty($pseudo)){
        $valid = false;
        $er_pseudo = ("Le nom d' utilisateur ne peut pas être vide");
        }   
          // Vérification du mail
        if(empty($mail)){
            $valid = false;
            $er_mail = "Le mail ne peut pas être vide";
            
          // On vérifit que le mail est dans le bon format
        }elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $mail)){
                
            $valid = false;
            $er_mail = "Le mail n'est pas valide";
            
        }else{
                    // On vérifit que le mail est disponible
            $req_mail = $DB->query("SELECT email FROM user WHERE email = ?", array($mail));
            
            $req_mail = $req_mail->fetch();

            if ($req_mail['mail'] <> ""){
            $valid = false;
            $er_mail = "Ce mail existe déjà";
            }
        }

        // Vérification du mot de passe
        if(empty($mdp)) {
            $valid = false;
            $er_mdp = "Le mot de passe ne peut pas être vide";

        }elseif($mdp != $confmdp){
            $valid = false;
            $er_mdp = "La confirmation du mot de passe ne correspond pas";
        }

        // Si toutes les conditions sont remplies alors on fait le traitement
        if($valid){
            

            $mdp = crypt($mdp, "$6$rounds=5000$macleapersonnaliseretagardersecret$");
            $date_creation_compte = date('Y-m-d H:i:s');

            // On insert nos données dans la table utilisateur
            $DB->insert("INSERT INTO user (pseudo, email, `password` , date_inscription) VALUES
            (?, ?, ?, ?, ?)",
            array($pseudo, $prenom, $mail, $mdp, $date_creation_compte));

            header('Location: register.php');
            exit;
                }
            }
        }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Inscription</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/CSS/register.css'>
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
            INSCRIPTION
        </h1>
    </div>

    <!--debut de l'insciption-->
    <div id="login">
        <form method="POST" action="register.php">
            <div id="email">
            <?php
                if (isset($er_mail)){
            ?>
                <div><?= $er_mail ?></div>
            <?php 
                }
            ?>
                <!-- Input pour l'email-->
                <input type="text" class="input_connexion" placeholder="Email" name="mail" required>
            </div>
            <br>
            <div id="pseudo">
            <?php
        //si erreur sur le nom alors on affiche
                if (isset($er_pseudo)){
            ?>
                <div><?= $er_pseudo ?></div>
            <?php 
                }
            ?>
                <!-- Input pour le pseudo-->
                <input type="text" class="input-mdp" name="login" placeholder="Pseudo" pattern=".{4,}" >
            </div>
            <br>
            <div id="motdepasse">
            <?php
                if (isset($er_mdp)){
            ?>
                <div><?= $er_mdp ?></div>
            <?php 
                }
            ?>
                <!-- Inpur pour le mot de passe-->
                <input type="password" name="pwd1" class="input-mdp" placeholder="Mot de passe"  required>
            </div>
            <br>
            <div id="motdepasse">
            <?php
                if (isset($er_mdp)){
            ?>
                <div><?= $er_mdp ?></div>
            <?php 
                }
            ?>                                                                                                      <!-- pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}([&#@=€$%*?\/:!\-+])"-->
                <!-- Input pour confirmer le mot de passe -->
                <input type="password" name="pwd2" class="input-mdp" placeholder="Confirmer Mot de passe"   required>
            </div>
        
        <br>
            <!-- Bouton pour l'inscription-->
            <button type="submit" name="insciption" value="inscription" id="bouton_inscription">
                Inscription
            </button>
        </form>
    </div>
    <!--fin de l'insciption-->

    <!--debut du footer-->
    <?php

        include_once 'view/footer.inc.php';
        ?>

    <!--Fin du footer-->




    
</body>
</html>


