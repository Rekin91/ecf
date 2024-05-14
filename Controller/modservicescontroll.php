<?php

// Modifier un services // 


$services = $_POST["services"];
$name = $_POST["name"];
$description = $_POST["description"];
$horaires = $_POST["horaires"]; 

try {
    $pdo = new PDO('mysql:host=localhost;dbname=ecf', 'root', ''); 

    $stmt = $pdo->prepare("UPDATE services SET name = (:name), description = (:description), horaires = (:horaires) WHERE id=(:id)");

    $stmt->bindParam(':id', $services);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':horaires', $horaires);

    if ($stmt->execute()) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
    } else {
        echo "Erreur" . implode(", ", $stmt->errorInfo());
    } 
}
catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}