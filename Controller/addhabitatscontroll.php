<?php


// Ajouter un habitat //

$name = $_POST["name"];
$description = $_POST["description"];


try {
    $pdo = new PDO('mysql:host=localhost;dbname=ecf', 'root', ''); 

    $stmt = $pdo->prepare("INSERT INTO habitats (name, description) VALUES (:name, :description)");

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

