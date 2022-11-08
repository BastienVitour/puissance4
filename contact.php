<!DOCTYPE html>
<html>


<head> <!-- Début du Head -->
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Contacte</title>
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
        <form class="form">
            <input type="text" class="name" placeholder="Nom"> <!-- Zone de texte "Nom" -->
            <input type="Email" class="email" placeholder="Email"><br><br> <!-- Zone de texte "Email" -->
            <input type="Sujet" class="subject" placeholder="Sujet"><br><br> <!-- Zone de texte "Sujet" -->
            <input type="Message" class="message" placeholder="Message"></textarea><br><br> <!-- Zone de texte "Message" -->
            <button id="bouton_connexion"> Envoyer </button> <!-- Bouton Envoyer -->
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