<?php


// Ajouter un animal //
$habitat = $_POST["habitat"];
$race = $_POST["race"];
$name = $_POST["name"];
$food = $_POST["food"];
$gramfood = $_POST["gfood"];
$etat = $_POST["etat"];
$details = $_POST["details"];
$photos = $_POST["photos"];


try {
    $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi'); 

    $stmt = $pdo->prepare("INSERT INTO animals (id_habitat, id_race, name, food, gramfood, etat, details, photos) VALUES (:habitat, :race, :name, :food, :gramfood, :etat, :details, :photos)");

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':food', $food);
    $stmt->bindParam(':gramfood', $gramfood);
    $stmt->bindParam(':etat', $etat);
    $stmt->bindParam(':details', $details);
    $stmt->bindParam(':photos', $photos);
    $stmt->bindParam(':habitat', $habitat);
    $stmt->bindParam(':race', $race);


    if ($stmt->execute()) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
    } else {
        echo "Erreur" . implode(", ", $stmt->errorInfo());
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

;

