<?php require_once "header.php" ;
if ($_SESSION["role"] != "veterinaire") {
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

<!-- Animals -->

<section class="page-section bg-light" id="animals">

<div class="container align-item-center text-center">
    <h2 class="section-heading text-uppercase"> Compte rendu des animaux</h2>
 <?php 
 require_once "model/Animals.php";
 require_once "Controller/animalscontroll.php"; ?>

                                    <form action="Controller/veterinairecontroll.php" method="POST">

                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="id" class="form-label text-uppercase">Choisir l'animal a modifier</label>
                                    <select class="form-control" id="services" name="id" required>
                                    <?php foreach ($animals as $animal): ?>
                                    <option value="<?php echo $animal->getId(); ?>"><?php echo $animal->getName(); ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                    </div>
                

                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="food" class="form-label text-uppercase">Nourriture</label>
                                    <input type="text" class="form-control" id="food" name="food" placeholder="viande rouge" required>
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
                                    <label for="date" class="form-label text-uppercase">date de passage</label>
                                    <input type="datetime-local" class="form-control" id="date" name="date" required>
                                    </div>

                                    <div class="col-md-6 mb-3 mx-auto">
                                      <label for="details" class="form-label text-uppercase">details</label>
                                      <input class="form-control" id="details" name="details" rows="3" placeholder="">
                                    </div>

                                    
                                    <input type="submit" class="btn btn-primary text-uppercase">
                                    </form>

                                   <?php  if (isset($_SESSION['veter_success'])) {
                                    echo "<p>{$_SESSION['veter_success']}</p>";
                                    unset($_SESSION['veter_success']);
                                    }
                                    if (isset($_SESSION['veter_error'])) {
                                     echo "<p>{$_SESSION['veter_error']}</p>";
                                    unset($_SESSION['veter_error']);
                                      }
                                    
                                    ?>
</div>
</section>

<!-- Hatitats -->

<section class="page-section" id="habitats">

<div class="container align-item-center text-center">
    <h2 class="section-heading text-uppercase"> Laisser un avis sur un habitat</h2>

    <?php
    require_once "model/Habitats.php";
    require_once "Controller/habitatcontroll.php"
    ?>

                                        <form action="Controller/veterinairehabitat.php" method="POST">

                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="id" class="form-label text-uppercase">Choisir l'habitat</label>
                                    <select class="form-control" id="id" name="id" required>
                                    <?php foreach ($habitats as $habitat): ?>
                                    <option value="<?php echo $habitat->getId(); ?>"><?php echo $habitat->getName(); ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                    </div>


                                    <div class="col-md-6 mb-3 mx-auto">
                                    <label for="avis" class="form-label text-uppercase">avis</label>
                                    <input type="text" class="form-control" id="avis" name="avis">
                                    </div>
                                    <input type="submit" class="btn btn-primary text-uppercase">

                                    </form>

                                   <?php  if (isset($_SESSION['habitavis_success'])) {
                                    echo "<p>{$_SESSION['habitavis_success']}</p>";
                                    unset($_SESSION['habitavis_success']);
                                    }
                                    if (isset($_SESSION['habitavis_error'])) {
                                     echo "<p>{$_SESSION['habitavis_error']}</p>";
                                    unset($_SESSION['habitavis_error']);
                                      }
                                    
                                    ?>
                        
</div>
</section>

<!-- HISTORIQUE NOURRITURE PAR ANIMAL -->

<section class="page-section bg-light" id="histo">
    <div class="container align-item-center text-center">
        <h2 class="section-heading text-uppercase">Historique de nourriture par animal</h2>
 
        <?php
        require_once "model/histofoods.php";
        require_once "Controller/histofoodcontroll.php"
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
            
            <button type="submit" class="btn btn-primary" action="veterinaire.php#histo">Afficher l'historique</button>
 
            
          

        </form>

        <?php if(!empty($_GET)){
        showHistoFoodById(); }?>

 
</section>




<?php require_once "footer.php" ?>