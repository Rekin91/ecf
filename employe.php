<?php 

require_once "header.php"; 
if ($_SESSION["role"] != "employe") {
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


<!-- SERVICES -->

<section class="page-section bg-light" id="services">

<div class="container align-item-center text-center">
    <h2 class="section-heading text-uppercase"> Liste des services</h2>
    <h3 class="section-subheading">selectionner un élément pour supprimer</h3>

<?php
require_once "model/services.php";
require_once "Controller/servicescontroll.php"; ?>

<form action="" method="POST"> <hr>
    <?php foreach ($services as $service): ?>
        <div class="container">
            <h5 class="text-uppercase"><?php echo $service->getName(); ?></h5>
            <strong>Description: </strong><?php echo $service->getDescription(); ?><br>
            <strong>Horaires:</strong> <?php echo $service->getHoraires(); ?><br>
            <input class="btn-primary" type="checkbox" name="services[]" value="<?php echo $service->getId(); ?>"> 
        </div>
        <hr>
    <?php endforeach; ?>

    <button class="btn btn-primary text-uppercase" type="submit" formaction="Controller/delservicescontroll.php">Supprimer</button>
    <br>
    
</form>
    </br>

<button class="btn btn-primary text-uppercase" data-bs-toggle="modal" href="#addservices">Ajouter</button>
<button class="btn btn-primary text-uppercase" data-bs-toggle="modal" href="#modservices">modifier</button>
    
</div>
</section>


<!-- NOURRIR UN ANIMAL -->

<section class="page-section">

<div class="container align-item-center text-center">
    <h2 class="section-heading text-uppercase"> Nourrir un animal </h2>
<?php 
require_once "model/Animals.php";
require_once "Controller/animalscontroll.php"    ?>
                            <form action="Controller/foodanimalscontroll.php" method="POST">
                                <div class="col-md-6 mb-3 mx-auto">
                                    <label for="id" class="form-label text-uppercase">Choisir l'animal a nourrir</label>
                                    <select class="form-control" id="services" name="id" required>
                                    <?php foreach ($animals as $animal): ?>
                                    <option value="<?php echo $animal->getId(); ?>"><?php echo $animal->getName(); ?></option>
                                    <?php endforeach; ?>
                                    </select>

                                    <div class="mb-3"></div>


                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="food" class="form-label text-uppercase">Nourriture</label>
                                    <input type="text" class="form-control" id="food" name="food" placeholder="croquette" required>
                                    </div>

                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="gfood" class="form-label text-uppercase">Nourriture en grammes</label>
                                    <input type="number" class="form-control" id="gfood" name="gfood" placeholder="180" required>
                                    </div>

                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="date" class="form-label text-uppercase">Date et heure</label>
                                    <input type="datetime-local" class="form-control" id="date" name="date" placeholder="" required>
                                    </div>


                                    <button class="btn btn-primary text-uppercase" data-bs-toggle="modal" href="#modservices">Ajouter</button>
                                </div>
                                </form>

</div>
</section>

<!-- VALIDER UN AVIS CLIENT --> 

<section class="page-section bg-light">

<div class="container align-item-center text-center" id="avis">
    <h2 class="section-heading text-uppercase"> Valider un avis clients </h2>

<?php 
require_once "model/avis.php";
require_once "Controller/aviscontroll.php" ;?> 

<form action="Controller/validateaviscontroll.php" method="POST"> <hr>
    <?php foreach ($opinions as $opinion): ?>
        <div style="word-wrap: break-word;" class="container">
            <h5 class="text-uppercase"><?php echo $opinion->getId(); ?></h5>
            <strong>Pseudo : </strong><?php echo $opinion->getPseudo(); ?><br>
            <strong>Avis :</strong> 
            <?php echo $opinion->getAvis(); ?><br>
            <strong>Valider : </strong>
            <?php
             if($opinion->getValidate() == 0) {
                echo "non";
             }
             elseif ($opinion->getValidate() == 1) {
                echo "oui";
             }

?> <br>



            <input class="btn-primary" type="checkbox" name="opinions[]" value="<?php echo $opinion->getId(); ?>"> 
        </div>
        <hr>
    <?php endforeach; ?>

    <button class="btn btn-primary text-uppercase" type="submit">activer</button>
    <button class="btn btn-primary text-uppercase" type="submit" formaction="Controller/unvalidateaviscontroll.php">desactiver</button>
    <br>
    
</form>







</div>

</section>

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
















<?php require_once "footer.php"; ?>