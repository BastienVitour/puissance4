<?php 
require_once 'includes/database.inc.php'
?>
<?php
$DB = new PDO('mysql:host=localhost;dbname=puissance4;charset=utf8', 'root', 'root');
require "PHPMailer/PHPMailerAutoload.php";



$valid=true;
session_start();
include('includes/database.inc.php');
$error = false;
 // S'il y a une session alors on ne retourne plus sur cette page





if(!empty($_POST)){

    //echo '<pre>';print_r($_POST);
    //die('eeee');
  
    

 
     
    // On se place sur le bon formulaire grâce au "name" de la balise "input"
    if (isset($_POST['login'])){
         // on récupère le prénom  
         $mail= $_POST['mail'];
         
         $pwd= $_POST['pwd'];
           
        //$pseudo= htmlentities(trim($pseudo));
        //$mail = htmlentities(strtolower(trim($mail))); // On récupère le mail
        //$mdp = trim($mdp); // On récupère le mot de passe
        //$confmdp = trim($confmdp); // On récupère la confirmation du mot de passe

     
                // Vérification du pseudo
        if(empty($pwd)) {
            $valid = false;
            $er_mdp = "Le mot de passe ne peut pas être vide";

        }else{
            // On vérifit que le mdp est bon
        $DB = new PDO('mysql:host=localhost;dbname=puissance4;charset=utf8', 'root', 'root');

        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $pwd = $_POST['pwd'];
        $stmt = $DB->prepare("SELECT `password` FROM user WHERE `password`=?");
        $stmt->execute([$pwd]); 
        $user = $stmt->fetch();
        if ($user) {
            
        }else{
            $valid=false;
            $er_mdp = "Le mdp est faux";
        }
  
        
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
            $DB = new PDO('mysql:host=localhost;dbname=puissance4;charset=utf8', 'root', 'root');

            $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $email = $_POST['mail'];
            $stmt = $DB->prepare("SELECT `email` FROM user WHERE email=?");
            $stmt->execute([$email]); 
            $user = $stmt->fetch();
            if ($user) {
                
            }else{
                $valid=false;
                $er_mail = "Le mail existe pas";
            }
            
            
            
            }
        

            
    
    
        // Vérification du mot de passe
        

        // Si toutes les conditions sont remplies alors on fait le traitement
        if($valid){
            

            //$mdp = crypt($mdp, "$6$rounds=5000$macleapersonnaliseretagardersecret$");
            $date_last_connexion = date('Y-m-d H:i:s');

            // On insert nos données dans la table utilisateur
            /*$DB->prepare("INSERT INTO user (pseudo, email, `password` , date_inscription) VALUES
            (?, ?, ?, ?, ?)",
            
            array($pseudo, $mail, $mdp, $date_creation_compte));*/
           
            
            $DB = new PDO('mysql:host=localhost;dbname=puissance4;charset=utf8', 'root', 'root');

            $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $DB->prepare("UPDATE `user` SET `date_last_connexion`=NOW() WHERE email='$_POST[mail]'");
            $stmt->execute([$email]); 



            
            $stmt2 =$DB->prepare("SELECT `id` FROM user WHERE email='$_POST[mail]'");
            $stmt2->execute([$email]);
            $user = $stmt2->fetch();
            $_SESSION["user_id"]=$user;
            
         
        
            

            header('Location: accueil.php');
            
        
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
    <title>Connexion</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/CSS/login.css'>
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
            CONNEXION
        </h1>
    </div>
    
    <!--debut de la partie de connexion-->
    <div id="login">
        <form  method="POST" action="login.php">
            <div id="email">
            <?php
                if (isset($er_mail)){
            ?>
                <div><?= $er_mail ?></div>
            <?php 
                }
            ?>
                <!--input pour l'email-->
                <input type="Email" class="input_connexion" name="mail" placeholder="Email">
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
                <!-- input pour le mot de passe-->
                <input type="password" class="input-mdp" name="pwd" placeholder="Mot de passe">
            </div>
        
        <br>
            <!-- Bouton pour la connexion-->
            <button id="bouton_connexion" name="login" type="submit" >
                Connexion
            </button>
        </form>
            <!-- Bouton pour l'inscription-->
            <button id="bouton_inscription"  onclick="window.location.href = 'register.php';">
                Inscription
            </button>
    </div>
    <!-- fin de la partie de connexion-->



    <!--debut du footer-->
    <?php

include_once 'view/footer.inc.php';
?>

    <!--Fin du footer-->
    
</div>
    
</body>
</html>


