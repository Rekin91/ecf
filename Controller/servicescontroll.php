<?php


function getAllServices(){
    $pdo = new PDO('mysql:host=localhost;dbname=ecf', 'root', '');
    $statement = $pdo->prepare('SELECT * FROM services');
    $statement->execute();
    
     while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $service = new Services(
        $row["id"],
        $row["name"],
        $row["description"],
        $row["horaires"]
    );
    $services[] = $service;
    } 
   return $services;
}
$services = getAllServices();

