<?php

// Suprimmer un animal//

$animal = $_POST["animal"];


try {
    $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi'); 
 

    $stmt = $pdo->prepare("DELETE FROM animals WHERE id=(:id)");

    $stmt->bindParam(':id', $animal);
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