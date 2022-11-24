<?php
session_start();



require_once '../../includes/database.inc.php';

if (isset($_POST['timer'])){

    $score=$_POST['timer'];
    $user=$_SESSION['user_id'];
    $sql = "INSERT INTO `score` ( `id_user`, `id_game`, `id_difficulty`, `score`, `date_game`) VALUES ('$user', '1', '3', '$score',NOW())";
    $mysqlClient->exec($sql);
    
   // var_dump( $mysqlClient->errorInfo());
  
}else{
    echo "error";
}




?>