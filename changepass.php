<?php require_once "header.php" ?>

<!-- Masthead-->
 <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Bienvenue au</div>
                <div class="masthead-heading text-uppercase">ZOO d'Arcadia</div>
            </div>
        </header>


        <!-- FORMULAIRE DE CHANGEMENT DE MOT DE PASSE -->

        <section class="page-section bg-light" id="connexion">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Merci de changer votre mot de passe</h2>
            <h3 class="section-subheading text-muted">obligatoire pour la premiere connection</h3>
        </div>
        <div class="container align-item-center text-center">
            <div class="col-md-6 mb-3 mx-auto">
                <form action="Controller/changepassword.php" method="POST" class="text-center">
                    <div class="form-group">
                        <label for="email">Confirmer votre email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="aaaa@email.fr" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Nouveau Mot de passe</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
                    </div>
                    <br>
                    <div>
                        <button type="submit" class="btn btn-primary text-uppercase">envoyer</button>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</section>


<?php require_once "footer.php" ?>