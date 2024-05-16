<?php


// modifier un animal par le veterinaire //


$id = htmlspecialchars($_POST["id"]);
$food = htmlspecialchars($_POST["food"]);
$gramfood =htmlspecialchars( $_POST["gfood"]);
$etat = htmlspecialchars($_POST["etat"]);
$details = htmlspecialchars($_POST["details"]);
$date =htmlspecialchars($_POST["date"]);

session_start();

try {
    $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi'); 

    $stmt = $pdo->prepare("UPDATE animals SET food = (:food), gramfood = (:gramfood), etat = (:etat), passdate = (:date), details = (:details) WHERE id=(:id)");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':food', $food);
    $stmt->bindParam(':gramfood', $gramfood);
    $stmt->bindParam(':etat', $etat);
    $stmt->bindParam(':details', $details);
    $stmt->bindParam(':date', $date);



    if ($stmt->execute()) {
        $_SESSION['veter_success'] = "l'animal a bien été modifier";
        header('Location: ../veterinaire.php');
    exit;
    } else {
        $_SESSION['veter_error'] = "erreur lors de la modification de l'animal";
        header('Location: ../veterinaire.php');
        exit;
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

;