<?php

// Suprimmer un services //

$services = $_POST["services"];


try {
    $pdo = new PDO('mysql:host=localhost;dbname=ecf', 'root', ''); 

    foreach ($services as $service) {

    $stmt = $pdo->prepare("DELETE FROM services WHERE id=(:id)");

    $stmt->bindParam(':id', $service);
    if ($stmt->execute()) {
    
    } else {
        echo "Erreur" . implode(", ", $stmt->errorInfo());
    } 
}
header('Location: ' . $_SERVER['HTTP_REFERER']);;
exit;
}
catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
