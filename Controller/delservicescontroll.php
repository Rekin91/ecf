<?php

// Suprimmer un services //

$services = $_POST["services"];


try {
    $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi'); 

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
