<?php 
require_once 'includes/database.inc.php'
?>
<?php




$valid=true;
$error = false;

if(!empty($_POST)){

     
    // On se place sur le bon formulaire grâce au "name" de la balise "input"
    if (isset($_POST['login']))
        {
         $mail= $_POST['mail'];
         $subject=$_POST['subject'];
         $nom= $_POST['nom'];
         $message= $_POST['message'];

     
        // Vérification du nom
        if(empty($nom)) 
            {
            $valid = false;
            $er_mdp = " Veuillez vérifier le formulaire";
            }
        //verrification du subject
        if(empty($subject))  
            {
            $valid=false;
            $er_subject="Le sujet ne peut être vide";
            }

        // Vérification du mail
        if(empty($mail))
            {
            $valid = false;
            $er_formulaire = " Veuillez vérifier le formulaire";
            }
        // On vérifit que le mail est dans le bon format
        elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $mail))
            {    
            $valid = false;
            $er_mail = " Veuillez vérifier le formulaire";
            }
        if(strlen($message)<15)
            {
            $valid=false;
            $er_formulaire="Veuillez vérifier le formulaire";
            }
            
    if($valid)
        {
        $er_formulaire="Votre message a bien été envoyé";
   
        }


        
            
    }
}
        
    



?>





<!DOCTYPE html>
<html>


<head> <!-- Début du Head -->
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Contact</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='assets/CSS/contact.css'>
    <link rel="shortcut icon" href="assets/images/icone.png" type="image/x-icon">
    <script src='contact.js'></script>
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
            NOUS CONTACTER
        </h1>
    </div>





    <div id="icon"> <!-- Début des icones pour nous contacter-->
        <div id="phone"> <!-- Image liens vers les options avec numéro de téléphone-->
            <a href="http://maps.google.com/?q=3 Rue Armand Moisant, 75015 Paris">
            <img alt="Phone" src="https://icones.pro/wp-content/uploads/2021/03/icone-d-appel-et-d-appel-telephonique-orange.png" id="telephone"></a>
            <p id="pl">  06 52 32 59 77                    </p>
        </div>
        <div id="mail"> <!-- Image liens vers l'Email-->
            <a href="http://maps.google.com/?q=3 Rue Armand Moisant, 75015 Paris">
            <img alt="Email" src="https://icones.pro/wp-content/uploads/2021/03/icone-gmail-logo-png-orange.png" id="email"></a>
            <p id="pl">support@powerofmemory.com</p>
        </div>      
        <div id="gps"> <!-- Image liens vers la position Google Map-->
            <a href="http://maps.google.com/?q=3 Rue Armand Moisant, 75015 Paris">
            <img alt="Maps" src="https://icones.pro/wp-content/uploads/2021/10/icones-google-maps-orange.png" id="maps"></a>
            <p id="pl"> Montparnasse</p>
        </div>
    </div> <!-- Fin des icones pour nous contacter https://icones.pro/wp-content/uploads/2021/05/icones-de-messagerie-orange.png-->




    <div id="form"> <!-- Début du Formulaire d'aide-->

        <form class="form" method="POST" action="contact.php">
        <?php
                if (isset($er_formulaire)){
            ?>
                <div><p ><?= $er_formulaire ?></p></div>
            <?php 
                }
            ?>
            <input type="text" class="name" placeholder="Nom" name="nom" > <!-- Zone de texte "Nom" -->
            <input type="text" class="email" placeholder="Email" name="mail" ><br><br> <!-- Zone de texte "Email" -->
            <input type="text" class="subject" placeholder="Sujet" name="subject" ><br><br> <!-- Zone de texte "Sujet" -->
            <input type="text" class="message" placeholder="Message" name="message" ><br><br> <!-- Zone de texte "Message" -->
            <button id="bouton_connexion" type="submit" name="login"> Envoyer </button> <!-- Bouton Envoyer -->
        </form>
    </div> <!-- Fin du Formulaire d'aide-->




        <br> <!-- Début Saut de ligne entre le Formulaire de plainte et le Footer-->
        <br>
        <br> <!-- Fin Saut de ligne entre le Formulaire de plainte et le Footer -->




        <?php

        include_once 'view/footer.inc.php';
        ?> <!-- Fin du Footer-->


    </div> <!-- Fin de la div Body-->
</body>
</html>