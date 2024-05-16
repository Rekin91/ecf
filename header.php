<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Agency - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
    <?php session_start(); ?>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar" href="index.php#page-top"><img src="assets/img/LOGOZOO.png" alt="logoduzoo" height="60"/></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                   
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.php#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="animaux.php#portfolio">Animaux</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="connexion.php">Connexion</a></li>
                        <?php
        
        if (!empty($_SESSION["role"])) {
            if ($_SESSION["role"] == "admin") {
        ?>
                <li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li>
                
        <?php
            } elseif ($_SESSION["role"] == "employe") {
        ?>
                <li class="nav-item"><a class="nav-link" href="employe.php">Employe</a></li>
        <?php
            } elseif ($_SESSION["role"] == "veterinaire") {
        ?>
                <li class="nav-item"><a class="nav-link" href="veterinaire.php">Veterinaire</a></li>
        <?php
            }
            ?>
                <li class="nav-item"><a class="nav-link" href="Controller/deconnexion.php">Déconnexion</a></li>
        <?php
        }
        
        
        ?>
                    </ul>
                </div>
            </div>
        </nav>
       