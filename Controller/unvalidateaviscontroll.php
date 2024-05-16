<?php

// retirer un avis //

$opinions = $_POST["opinions"];
$validate = 0;

try {
    $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi'); 

    foreach ($opinions as $opinion) {

    $stmt = $pdo->prepare("UPDATE avis SET validate = (:validate) WHERE id=(:id)");

    $stmt->bindParam(':id', $opinion);
    $stmt->bindParam(':validate', $validate);
    if ($stmt->execute()) {

    } else {
        echo "Erreur" . implode(", ", $stmt->errorInfo());
    } 
}
header("Location: ../employe.php#avis");
exit;
}
catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
