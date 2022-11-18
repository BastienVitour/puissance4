<footer>
            <div id="not_credit">
                <div id="information">
                    <h4>Information</h4>
                        <p>
                            <span class="text_orange">Tel : </span>00 00 00 00 00
                        </p>
                        
                        <p>
                            <span class="text_orange">Email : </span>test@gmail.com
                        </p>
                        
                        <p>
                            <span class="text_orange">Localisation : </span>Paris
                        </p>

                        <!--Début de la partie lien réseaux-->
                        <div id="reseaux_sociaux">
                            <a href="https://facebook.com" target="_blank"><img class="bouton_reseaux_sociaux" src="assets/images/facebook.png" width="32" ></a>
                            <a href="https://github.com/sylv0r/puissance4" target="_blank"><img class="bouton_reseaux_sociaux" src="assets/images/github.png" width="30"></a>
                            <a href="https://gmail.com" target="_blank"><img class="bouton_reseaux_sociaux" src="assets/images/mail.png" width="30"></a>
                            <a href="https://pinterest.com" target="_blank"><img class="bouton_reseaux_sociaux" src="assets/images/pinterest.png" width="30"></a>
                            <a href="https://twitter.com" target="_blank"><img class="bouton_reseaux_sociaux" src="assets/images/twitter.png" width="30"></a>
                            <a href="https://trello.com/b/kty67NDZ/puisssance-4" target="_blank"><img class="bouton_reseaux_sociaux"src="assets/images/trello.png" width="35"></a>
                        </div>
                        <!--Fin de la partie liens réseaux-->

                </div>

                        <div id="power_of_memory">
                            <h4>Power Of Memory</h4>
                            <ul>

                            <?php
                                if (isset($_SESSION['user_id'])) {
                                $button_link = 'memory.php';
                                }
                                else {
                                    $button_link = 'login.php';
                                }
                            ?>

                                <li class="text_orange"><a href=<?= $button_link ?> class="gris">Jouer !</a></li>

                            <?php
                                if (isset($_SESSION['user_id'])) {
                                $button_link = 'scores.php';
                                }
                                else {
                                    $button_link = 'login.php';
                                }
                            ?>

                                <li class="text_orange"><a href=<?= $button_link ?> class="gris">Les scores</a></li>

                            <?php
                                if (isset($_SESSION['user_id'])) {
                                $button_link = 'contact.php';
                                }
                                else {
                                    $button_link = 'login.php';
                                }
                            ?>

                                <li class="text_orange"><a href="contact.php" class="gris">Nous contacter</a></li>


                            </ul>
                        </div>
            </div>
            
            <div id="credit">
            <p>Copyright ® 2022 Tout droit réservés</p>
            </div>

        </footer>

        <!--Fin du footer-->
        