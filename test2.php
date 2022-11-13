<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
        <h1>Bases de données MySQL</h1>  
        <?php
            $servname = 'localhost';
            $dbname = 'puissance4';
            $user = 'root';
            $pass = '';
            
            try{
                $dbco = new PDO('mysql:host=localhost;dbname=puissance4;charset=utf8', 'root', 'root');
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sql = "INSERT INTO `user` (`id`, `email`, `password`, `pseudo`, `date_inscription`, `date_last_connexion`) 
                VALUES (NULL, 'aaaaaaaaa', 'aaaaaaaaaaaaaa', 'aaaaaaaaaaaa', '2022-11-10 10:32:15.000000', '2022-11-10 10:32:15.000000');";
                
                $dbco->exec($sql);
                echo 'Entrée ajoutée dans la table';
            }
            
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>
</html>