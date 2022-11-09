<?php
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
{
    $url = "https";
}
else
{
    $url = "http"; 
}  
$url .= "://"; 
$url .= $_SERVER['HTTP_HOST']; 
$url .= $_SERVER['PHP_SELF']; 

$page_title = ['index', 'login', 'register', 'contact', 'memory', 'scores', 'myaccount'];

?>

<header>

<h2 id="power_memory">The Power Of Memory</h2>

<!--Début de la partie liens vers les autres pages-->

        <nav>

                <div class="links">
                        <?php 
                            if (strpos($url, 'index')) { ?>
                                <h4 style="color : #fe7f00;"><a href="index.php">ACCUEIL</a></h4>
                        <?php    }
                            else { ?>
                                <h4><a href="index.php">ACCUEIL</a></h4>
                         <?php   }
                        ?>
                </div>

                <div class="links">
                        <?php 
                            if (strpos($url, 'memory')) { ?>
                                <h4 style="color : #fe7f00;"><a href="memory.php">JEU</a></h4>
                        <?php    }
                            else { ?>
                                <h4><a href="memory.php">JEU</a></h4>
                         <?php   }
                        ?>
                </div>

                <div class="links">
                        <?php 
                            if (strpos($url, 'scores')) { ?>
                                <h4 style="color : #fe7f00;"><a href="scores.php">SCORES</a></h4>
                        <?php    }
                            else { ?>
                                <h4><a href="scores.php">SCORES</a></h4>
                         <?php   }
                        ?>
                </div>

                <div class="links">
                        <?php 
                            if (strpos($url, 'myaccount')) { ?>
                                <h4 style="color : #fe7f00;"><a href="myaccount.php">MON ESPACE</a></h4>
                        <?php    }
                            else { ?>
                                <h4><a href="myaccount.php">MON ESPACE</a></h4>
                         <?php   }
                        ?>
                </div>

                <div class="links">
                        <?php 
                            if (strpos($url, 'login')) { ?>
                                <h4 style="color : #fe7f00;"><a href="login.php">CONNEXION</a></h4>
                        <?php    }
                            else { ?>
                                <h4><a href="login.php">CONNEXION</a></h4>
                         <?php   }
                        ?>
                </div>

                <div class="links">
                        <?php 
                            if (strpos($url, 'contact')) { ?>
                                <h4 style="color : #fe7f00;"><a href="contact.php">NOUS CONTACTER</a></h4>
                        <?php    }
                            else { ?>
                                <h4><a href="contact.php">NOUS CONTACTER</a></h4>
                         <?php   }
                        ?>
                </div>

        </nav>

<!--Fin de la partie liens vers les autres pages-->

</header>