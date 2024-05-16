<?php


function getAllServices(){
    $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi');
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

