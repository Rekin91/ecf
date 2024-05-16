
<?php require_once "header.php" ?>




<!-- Masthead-->
<header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Bienvenue au</div>
                <div class="masthead-heading text-uppercase">ZOO d'Arcadia</div>
            </div>
        </header>


<!-- FORMULAIRE DE CONTACT -->

<section class="page-section bg-light" id="contactform">
            <div class="container align-item-center text-center">
                <h2 class="section-heading text-uppercase">Laisser nous un message</h2>
                <h3 class="section-subheading text-muted">vous recevrez une réponse par mails dans les prochains jours</h3>

                <form method="POST" action="Controller/contactform.php">

<div class="col-md-6 mb-3 mx-auto">
  <label for="email" class="form-label">email</label>
  <input type="text" class="form-control" id="email" name="email" placeholder="email@email.fr">
</div>

<div class="col-md-6 mb-3 mx-auto">
  <label for="titre" class="form-label">titre</label>
  <input type="text" class="form-control" id="titre" name="titre" placeholder="titre de votre message">
</div>

<div class="col-md-6 mb-3 mx-auto">
  <label for="message" class="form-label">Votre message</label>
  <textarea class="form-control" id="message" name="message" rows="3" placeholder="Votre message ici"></textarea>
</div>
 <button class="btn btn-primary text-uppercase">Envoyer</button>
                </form>

              <?php 
             
              if (isset($_SESSION['message'])) {
              echo "<p>{$_SESSION['message']}</p>";
              unset($_SESSION['message']);
               }
            ?>


    
            </div>
        </section>



        <?php require_once "footer.php" ?>