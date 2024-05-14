<?php


// modifier un animal //


$id = $_POST["id"];
$habitat = $_POST["habitat"];
$race = $_POST["race"];
$name = $_POST["name"];
$food = $_POST["food"];
$gramfood = $_POST["gfood"];
$etat = $_POST["etat"];
$details = $_POST["details"];
$photos = $_POST["photos"];


try {
    $pdo = new PDO('mysql:host=localhost;dbname=ecf', 'root', ''); 

    $stmt = $pdo->prepare("UPDATE animals SET id_race = (:race), id_habitat = (:habitat), name = (:name), food = (:food), gramfood = (:gramfood), etat = (:etat), details = (:details), photos = (:photos) WHERE id=(:id) ");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':food', $food);
    $stmt->bindParam(':gramfood', $gramfood);
    $stmt->bindParam(':etat', $etat);
    $stmt->bindParam(':details', $details);
    $stmt->bindParam(':photos', $photos);
    $stmt->bindParam(':habitat', $habitat);
    $stmt->bindParam(':race', $race);


    if ($stmt->execute()) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);;
    exit;
    } else {
        echo "Erreur" . implode(", ", $stmt->errorInfo());
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

;