
<?php

require_once 'init.php';

$error = false;
$error2 = 0;

if (isset($_POST['mail'])) {
    // ici on a bien recu des donnees d'un formulaire

    // on verifie donc l'adresse email
    if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) !== false) {
        // l'email est valide donc je cree la variable $email
        $email = $_POST['mail'];
        $_SESSION['email'] = $_POST['mail'];
    }
    else {
        $error = 'Email invalide';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <ul>
        <li>
            <a href="mon_compte.php">
                Mon compte
            </a>
        </li>
        <li>
            <a href="logout.php">
                Se deconnecter
            </a>
        </li>
    </ul>   
    <?php 
    // if ($error2 === false) {
    //     echo 'error2 = false';
    // }
    if (isset($email)) { 
    ?>
    <p>
        <?= $email ?>
    </p>
    <?php
    }
    elseif($error !== false) {
        echo "<p>$error</p>";
    }
    ?>
    <form method="POST" action="form.php">
        Email:<br />
        <input type="text" name="mail">
    </form>
</body>
</html>