 
<?php 
require_once 'includes/database.inc.php'
?>
 <!DOCTYPE html>
 <html>
 <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
 </head>
 <body>

 <?php
$pdo = new PDO('mysql:host=localhost;dbname=puissance4;charset=utf8', 'root', 'root');
$email = "sylvian@gmail.com";
$stmt = $pdo->prepare("SELECT email FROM user WHERE email=?");
$stmt->execute([$email]); 
$user = $stmt->fetch();
if ($user) {
    echo "oui";
    $pdo->prepare("INSERT INTO `user` (`id`, `email`, `password`, `pseudo`, `date_inscription`, `date_last_connexion`) 
    VALUES (NULL, 'aaaaaaaaa', 'aaaaaaaaaaaaaa', 'aaaaaaaaaaaa', '2022-11-10 10:32:15.000000', '2022-11-10 10:32:15.000000');");
} else {
    echo "non";
} 
?>
 </body>
 </html>