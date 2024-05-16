<?php


// laisser un avis sur un habitat //

$id = $_POST["id"];
$avis = $_POST["avis"];

session_start();
 
try {
    $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi');

    $stmt = $pdo->prepare("UPDATE habitats SET avis = (:avis) WHERE id=(:id)");
    $stmt->bindParam(":id", $id);
    $stmt->bindparam(":avis", $avis);

    if ($stmt->execute()) {
        $_SESSION["habitavis_success"] = "l'avis sur l'habitat a bien été pris en compte" ;
        header('Location: ../veterinaire.php');
       exit;
    } else {
        $_SESSION["habitavis_error"] = "l'avis sur l'habitat a bien été pris en compte" ;
        header('Location: ../veterinaire.php');
       exit;
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

;