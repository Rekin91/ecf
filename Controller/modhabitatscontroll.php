<?php


// modifier un habitat //

$id = $_POST["id"];
$name = $_POST["name"];
$description = $_POST["description"];


try {
    $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi'); 

    $stmt = $pdo->prepare("UPDATE habitats SET name = (:name), description = (:description) WHERE id=(:id)");
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);

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