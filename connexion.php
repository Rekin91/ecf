<?php require_once "header.php" ?>

        <!-- Masthead-->
        <header class="masthead2">
            <div class="container">
                <div class="masthead-subheading">Bienvenue au</div>
                <div class="masthead-heading text-uppercase">ZOO d'Arcadia</div> 
                <!--<a class="btn btn-primary btn-xl text-uppercase" href="#services">plus</a>-->
            </div>
        </header>

        <!-- FORMULAIRE CONNECTION -->

        <section class="page-section bg-light" id="connexion">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Connexion</h2>
            <h3 class="section-subheading text-muted">Uniquement pour les employés du parc</h3>
        </div>
        <div class="container align-item-center text-center">
            <div class="col-md-6 mb-3 mx-auto">
                <form action="Controller/connexioncontrol.php" method="POST" class="text-center">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="aaaa@email.fr" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
                    </div>
                    <br>
                    <div>
                        <button type="submit" class="btn btn-primary text-uppercase">envoyer</button>
                    </div>
                </form>
                <?php 
                if(!empty($_SESSION["errorlog"])) {

                    echo $_SESSION["errorlog"];
                    unset($_SESSION["errorlog"]);

                }
                ?>
            </div>
        </div> 
    </div>
</section>


 <?php require_once "footer.php" ?>