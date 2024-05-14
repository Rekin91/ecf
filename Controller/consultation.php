<?php

    require '../vendor/autoload.php';

    use MongoDB\Client;

$client = new Client("mongodb://localhost:27017");

$database = $client->ecf;

$collection = $database->dashboard;

$race = $_POST['animalId'];

   

// Mettre à jour le compteur de consultations de l'animal
$updateResult = $collection->updateOne(
    ['race' => $race],
    ['$inc' => ['view' => 1]]
);
