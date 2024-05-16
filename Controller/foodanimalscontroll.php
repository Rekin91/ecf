<?php


// modifier un animal pour les employer //

$id = $_POST["id"];
$food = $_POST["food"];
$gramfood = $_POST["gfood"];
$date = $_POST["date"];



try {
    $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi'); 

    $stmt = $pdo->prepare("UPDATE animals SET food = (:food), gramfood = (:gfood), passdate = (:date) WHERE id=(:id)");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':food', $food);
    $stmt->bindParam(':gfood', $gramfood);
    $stmt->bindParam(':date', $date);


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