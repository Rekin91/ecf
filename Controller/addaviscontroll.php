<?php

if(isset($_POST["pseudo"]) && isset($_POST["avis"])) {

$pseudo = htmlspecialchars($_POST["pseudo"]);
$avis = htmlspecialchars($_POST["avis"]);


try {
    $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi'); 

    $stmt = $pdo->prepare("INSERT INTO avis (pseudo, avis) VALUES (:pseudo, :avis)");

    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':avis', $avis);

session_start();

    if ($stmt->execute()) {
        $_SESSION['success_avis'] = "l'avis a bien été envoyer";
        header('Location: ../index.php');;
       exit;
    } else {
        $_SESSION['error_avis'] = "l'avis n'a pas été envoyer";
        echo "Erreur :" . implode(", ", $stmt->errorInfo());
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
}
;
