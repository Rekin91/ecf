<?php require_once "header.php" ;

if ($_SESSION["role"] != "admin") {
header("location: connexion.php");
exit;
}
?>



 <!-- Masthead-->
 <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Bienvenue au</div>
                <div class="masthead-heading text-uppercase">ZOO d'Arcadia</div>
            </div>
        </header>


<!-- CREATION DE COMPTE -->

        <section class="page-section" id="creationcompte">
            <div class="container align-item-center text-center">
                <h2 class="section-heading text-uppercase"> Creation d'un compte</h2>
                
                <form action="Controller/usercontrol.php" method="POST">

<div class="col-md-3 mb-3 mx-auto">
  <label for="email" class="form-label text-uppercase">email</label>
  <input type="email" class="form-control" id="email" name="email" placeholder="email@email.fr" required>
</div>

<div class="col-md-3 mb-3 mx-auto">
  <label for="password" class="form-label text-uppercase">mot de passe</label>
  <input class="form-control" id="password" name="password" rows="3" placeholder="Motdepasse" required>
</div>

<div class="col-md-1 mb-3 mx-auto">

<div class="form-check text-uppercase">
  <input class="form-check-input" type="radio" name="role" id="veterinaire" value="veterinaire">
  <label class="form-check-label" for="veterinaire">Veterinaire</label>
</div>

<div class="form-check text-uppercase">
  <input class="form-check-input" type="radio" name="role" id="employe" value="employe">
  <label class="form-check-label" for="employe">Employe</label>
</div> 

</div>

<div class="mb-3">
    <input type="submit" class="btn btn-primary text-uppercase">
</div>
            </form>
    <?php
            if(!empty($_SESSION["account"])) {

echo $_SESSION["account"];
unset($_SESSION["account"]);
           } 
    ?> 

</div>
        </section>


<!-- SERVICES -->

<section class="page-section bg-light" id="services">

<div class="container align-item-center text-center">
    <h2 class="section-heading text-uppercase"> Liste des services</h2>
    <h3 class="section-subheading">selectionner un élément pour supprimer</h3>

<?php
require_once "model/services.php";
require_once "Controller/servicescontroll.php"; ?>

<form action="" method="POST"> <hr>
    <?php foreach ($services as $service){ ?>
        <div class="container">
            <h5 class="text-uppercase"><?php echo $service->getName(); ?></h5>
            <strong>Description: </strong><?php echo $service->getDescription(); ?><br>
            <strong>Horaires:</strong> <?php echo $service->getHoraires(); ?><br>
            <input class="btn-primary" type="checkbox" name="services[]" value="<?php echo $service->getId(); ?>"> 
        </div>
        <hr>
    <?php } ?>

    <button class="btn btn-primary text-uppercase" type="submit" formaction="Controller/delservicescontroll.php">Supprimer</button>
    <br>
    
</form>
    </br>

<button class="btn btn-primary text-uppercase" data-bs-toggle="modal" href="#addservices">Ajouter</button>
<button class="btn btn-primary text-uppercase" data-bs-toggle="modal" href="#modservices">modifier</button>
    
</div>
</section>

<!-- ANIMAUX -->

<section class="page-section" id="animaux">

<div class="container align-item-center text-center">
    <h2 class="section-heading text-uppercase"> Liste des animaux</h2>
<?php
require_once "model/Animals.php";
require_once "Controller/animalscontroll.php";
?>
    <?php
    animalsToTable();
    ?>

<button class="btn btn-primary text-uppercase" data-bs-toggle="modal" href="#addanimal">Ajouter</button>
<button class="btn btn-primary text-uppercase" data-bs-toggle="modal" href="#modanimal">modifier</button>
<button class="btn btn-primary text-uppercase" data-bs-toggle="modal" href="#delanimal">supprimer</button>
    </div>
</section>


<!-- HABITATS -->

<section class="page-section bg-light" id="habitats">

<div class="container align-item-center text-center">
    <h2 class="section-heading text-uppercase"> Liste des habitats</h2>
<?php
require_once "model/Habitats.php";
require_once "Controller/habitatcontroll.php";
?>
    <?php
    habitatsToTable();
    ?>

<button class="btn btn-primary text-uppercase" data-bs-toggle="modal" href="#addhabitat">Ajouter</button>
<button class="btn btn-primary text-uppercase" data-bs-toggle="modal" href="#modhabitat">modifier</button>
<button class="btn btn-primary text-uppercase" data-bs-toggle="modal" href="#delhabitat">supprimer</button>
    </div>
</section>

<!-- COMPTE RENDU VETERINAIRE -->

<section class="page-section" id="veterinaire">

<div class="container align-item-center text-center">
    <h2 class="section-heading text-uppercase"> Compte rendu des veterinaires</h2>


<?php 
require_once "model/histovet.php";
require_once "Controller/histovetcontroll.php"
?>

        <form method="GET" action="">
            <div class="col-md-6 mb-3 mx-auto">
                <label for="id" class="form-label text-uppercase">Choisir l'animal</label>
                <select class="form-control" id="id" name="id" required>
                    <?php foreach ($animals as $animal): ?>
                        <option value="<?php echo $animal->getId(); ?>"><?php echo $animal->getName(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary text-uppercase">Afficher l'historique par animal</button>
        </form>

<hr>
        <form method="GET" action="">
            <div class="col-md-6 mb-3 mx-auto">
                <label for="date" class="form-label text-uppercase">Choisir la date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <button type="submit" class="btn btn-primary text-uppercase">Afficher l'historique par date</button>
        </form>

        <?php
 
        if (!empty($_GET["id"])) {
            showHistovetById();
        }

       
        if (!empty($_GET["date"])) {
            showHistovetByDate();
        }
        ?>
<hr>
<h4 class="text-uppercase">dernier avis sur les habitats :</h4> 
<?php foreach ($habitats as $habitat) {
    echo "<strong>". $habitat->getName().": </strong>";
    echo $habitat->getAvis(). "<br>";
} ?>


</div>
</section>




    <!-- DASHBOARD -->

<section class="page-section bg-light" id="dashboard">

<div class="container align-item-center text-center">
    <h2 class="section-heading text-uppercase"> DASHBOARD </h2>
    <h3 class="section-subheading">liste des vues par animal</h3>

<?php 
require_once "Controller/showconsultation.php";

dbToTable();
?>






    </div>
    </section>









<!--------------------------------------------------------------------------------------------------------------------------- -->
<!--------------------------------------------------------------------------------------------------------------------------- -->
<!--------------------------------------------------------------------------------------------------------------------------- -->
<!--------------------------------------------------------------------------------------------------------------------------- -->
<!--------------------------------------------------------------------------------------------------------------------------- -->





<!-- popup ajouter un service-->
<div class="portfolio-modal modal fade" id="addservices" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <h2 class="text-uppercase">ajouter un Services</h2>

                                    <form action="Controller/addservicescontroll.php" method="POST">
                                
                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="name" class="form-label text-uppercase">nom du service</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="nom du service" required>
                                    </div>

                                    <div class="col-md-6 mb-3 mx-auto">
                                      <label for="description" class="form-label text-uppercase">description</label>
                                      <input class="form-control" id="description" name="description" rows="3" placeholder="description du service" required>
                                    </div>

                                    <div class="col-md-6 mb-3 mx-auto">
                                      <label for="horaires" class="form-label text-uppercase">horaires</label>
                                      <input class="form-control" id="horaires" name="horaires" rows="3" placeholder="12:30" >
                                    </div>

                                    <input type="submit" class="btn btn-primary text-uppercase" data-bs-dismiss="modal">
                                    </form>
                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- popup modifier un service-->
<div class="portfolio-modal modal fade" id="modservices" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <h2 class="text-uppercase">Modifier un Services</h2>

                                    <form action="Controller/modservicescontroll.php" method="POST">

                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="services" class="form-label text-uppercase">Choisir le service à modifier</label>
                                    <select class="form-control" id="services" name="services" required>
                                    <?php foreach ($services as $service): ?>
                                    <option value="<?php echo $service->getId(); ?>"><?php echo $service->getName(); ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                    </div>
                                
                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="name" class="form-label text-uppercase">nom du service</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="nom du service" required>
                                    </div>

                                    <div class="col-md-6 mb-3 mx-auto">
                                      <label for="description" class="form-label text-uppercase">description</label>
                                      <input class="form-control" id="description" name="description" rows="3" placeholder="description du service" required>
                                    </div>

                                    <div class="col-md-6 mb-3 mx-auto">
                                      <label for="horaires" class="form-label text-uppercase">horaires</label>
                                      <input class="form-control" id="horaires" name="horaires" rows="3" placeholder="12:30" >
                                    </div>

                                    <input type="submit" class="btn btn-primary text-uppercase" data-bs-dismiss="modal">
                                    </form>
                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


       <!-- popup ajouter un animal-->
<div class="portfolio-modal modal fade" id="addanimal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <h2 class="text-uppercase">ajouter un animal</h2>
                                   <?php
                                    require_once "model/Races.php";
                                    require_once "Controller/racescontroll.php" ;
                                    require_once "model/Habitats.php";
                                    require_once "Controller/habitatcontroll.php";
                                   ?>

                                    <form action="Controller/addanimalscontroll.php" method="POST">
                                 
                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="race" class="form-label text-uppercase">Choisir la race</label>
                                    <select class="form-control" id="race" name="race" required>
                                    <?php foreach ($races as $race): ?>
                                    <option value="<?php echo $race->getId(); ?>"><?php echo $race->getLabel(); ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                    </div>

                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="habitat" class="form-label text-uppercase">Choisir l'habitat</label>
                                    <select class="form-control" id="habitat" name="habitat" required>
                                    <?php foreach ($habitats as $habitat): ?>
                                    <option value="<?php echo $habitat->getId(); ?>"><?php echo $habitat->getName(); ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                    </div>

                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="name" class="form-label text-uppercase">Nom</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="gerrard" required>
                                    </div>

                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="food" class="form-label text-uppercase">Nourriture</label>
                                    <input type="text" class="form-control" id="food" name="food" placeholder="croquette" required>
                                    </div>

                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="gfood" class="form-label text-uppercase">Nourriture en grammes</label>
                                    <input type="number" class="form-control" id="gfood" name="gfood" placeholder="180" required>
                                    </div>

                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="etat" class="form-label text-uppercase">etat</label>
                                    <input type="text" class="form-control" id="etat" name="etat" placeholder="bon" required>
                                    </div>

                                    <div class="col-md-6 mb-3 mx-auto">
                                      <label for="details" class="form-label text-uppercase">details</label>
                                      <input class="form-control" id="details" name="details" rows="3" placeholder="gentil" required>
                                    </div>

                                    <div class="col-md-6 mb-3 mx-auto">
                                      <label for="photos" class="form-label text-uppercase">photos(lien)</label>
                                      <input type="text" class="form-control" id="photos" name="photos" rows="3" placeholder="https://monliendirect.img.fr" >
                                    </div>

                                    <input type="submit" class="btn btn-primary text-uppercase" data-bs-dismiss="modal">
                                    </form>
                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- popup modifier un animal-->
<div class="portfolio-modal modal fade" id="modanimal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <h2 class="text-uppercase">Modifier un animal</h2>

                                    <form action="Controller/modanimalscontroll.php" method="POST">

                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="id" class="form-label text-uppercase">Choisir l'animal a modifier</label>
                                    <select class="form-control" id="services" name="id" required>
                                    <?php foreach ($animals as $animal): ?>
                                    <option value="<?php echo $animal->getId(); ?>"><?php echo $animal->getName(); ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                    </div>
                                
                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="race" class="form-label text-uppercase">Choisir la race</label>
                                    <select class="form-control" id="race" name="race" required>
                                    <?php foreach ($races as $race): ?>
                                    <option value="<?php echo $race->getId(); ?>"><?php echo $race->getLabel(); ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                    </div>

                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="habitat" class="form-label text-uppercase">Choisir l'habitat</label>
                                    <select class="form-control" id="habitat" name="habitat" required>
                                    <?php foreach ($habitats as $habitat): ?>
                                    <option value="<?php echo $habitat->getId(); ?>"><?php echo $habitat->getName(); ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                    </div>

                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="name" class="form-label text-uppercase">Nom</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="gerrard" required>
                                    </div>

                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="food" class="form-label text-uppercase">Nourriture</label>
                                    <input type="text" class="form-control" id="food" name="food" placeholder="croquette" required>
                                    </div>

                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="gfood" class="form-label text-uppercase">Nourriture en grammes</label>
                                    <input type="number" class="form-control" id="gfood" name="gfood" placeholder="180" required>
                                    </div>

                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="etat" class="form-label text-uppercase">etat</label>
                                    <input type="text" class="form-control" id="etat" name="etat" placeholder="bon" required>
                                    </div>

                                    <div class="col-md-6 mb-3 mx-auto">
                                      <label for="details" class="form-label text-uppercase">details</label>
                                      <input class="form-control" id="details" name="details" rows="3" placeholder="gentil" required>
                                    </div>

                                    <div class="col-md-6 mb-3 mx-auto">
                                      <label for="photos" class="form-label text-uppercase">photos(lien)</label>
                                      <input type="text" class="form-control" id="photos" name="photos" rows="3" placeholder="https://monliendirect.img.fr" >
                                    </div>

                                    <input type="submit" class="btn btn-primary text-uppercase" data-bs-dismiss="modal">
                                    </form>
                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- popup supprimer un animal-->
<div class="portfolio-modal modal fade" id="delanimal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <h2 class="text-uppercase">supprimer un animal</h2>
                                 
                                    <form action="Controller/delanimalscontroll.php" method="POST">
                                 
                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="animal" class="form-label text-uppercase">Choisir l'animal a supprimer</label>
                                    <select class="form-control" id="animal" name="animal" required>
                                    <?php foreach ($animals as $animal): ?>
                                    <option value="<?php echo $animal->getId(); ?>"><?php echo $animal->getName(); ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                    </div>

                                  
                                    </div>

                                    <button type="submit" class="btn btn-primary text-uppercase" data-bs-dismiss="modal">supprimer</button>
                                    </form>
                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- popup ajouter un habitat -->
<div class="portfolio-modal modal fade" id="addhabitat" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <h2 class="text-uppercase">ajouter un habitat</h2>
                                
                                    <form action="Controller/addhabitatscontroll.php" method="POST">
                                 
        
                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="name" class="form-label text-uppercase">Nom</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="savane" required>
                                    </div>

                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="food" class="form-label text-uppercase">description</label>
                                    <input type="text" class="form-control" id="description" name="description" placeholder="description" required>
                                    </div>

    
                                </div>

                                    <button type="submit" class="btn btn-primary text-uppercase" data-bs-dismiss="modal">ajouter</button>
                                    </form>
                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- popup modifier un habitat -->
<div class="portfolio-modal modal fade" id="modhabitat" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <h2 class="text-uppercase">modifier un habitat</h2>
                                
                                    <form action="Controller/modhabitatscontroll.php" method="POST">
                                 
                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="id" class="form-label text-uppercase">Choisir l'habitat a modifier</label>
                                    <select class="form-control" id="id" name="id" required>
                                    <?php foreach ($habitats as $habitat): ?>
                                    <option value="<?php echo $habitat->getId(); ?>"><?php echo $habitat->getName(); ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                    </div>
        
                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="name" class="form-label text-uppercase">Nom</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="savane" required>
                                    </div>

                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="food" class="form-label text-uppercase">description</label>
                                    <input type="text" class="form-control" id="description" name="description" placeholder="description" required>
                                    </div>

    
                                </div>

                                    <button type="submit" class="btn btn-primary text-uppercase" data-bs-dismiss="modal">modifier</button>
                                    </form>
                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- popup supprimer un habitat -->
<div class="portfolio-modal modal fade" id="delhabitat" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <h2 class="text-uppercase">modifier un habitat</h2>
                                
                                    <form action="Controller/delhabitatscontroll.php" method="POST">
                                 
                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="id" class="form-label text-uppercase">Choisir l'habitat a supprimer</label>
                                    <select class="form-control" id="id" name="id" required>
                                    <?php foreach ($habitats as $habitat): ?>
                                    <option value="<?php echo $habitat->getId(); ?>"><?php echo $habitat->getName(); ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                    </div>
           
                                </div>

                                    <button type="submit" class="btn btn-primary text-uppercase" data-bs-dismiss="modal">supprimer</button>
                                    </form>
                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php require_once "Footer.php" ?>