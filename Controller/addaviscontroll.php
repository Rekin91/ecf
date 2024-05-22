<?php

session_start();
if($_SESSION["utilcontact"] == 1){

    $_SESSION["avis"] = "un message a déja été envoyer aujourd'hui merci de ressayer plus tard";
    header('location: ../index.php#avis');
    exit;


}

if(isset($_POST["pseudo"]) && isset($_POST["avis"])) {

$pseudo = htmlspecialchars($_POST["pseudo"]);
$avis = htmlspecialchars($_POST["avis"]);


try {
    $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi'); 

    $stmt = $pdo->prepare("INSERT INTO avis (pseudo, avis) VALUES (:pseudo, :avis)");

    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':avis', $avis);

    if ($stmt->execute()) {
        $_SESSION["utilcontact"] = 1;
        $_SESSION['avis'] = "l'avis a bien été envoyer";
        header('Location: ../index.php');
       exit;
    } else {
        $_SESSION['avis'] = "l'avis n'a pas été envoyer";
        exit;
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
}
;
