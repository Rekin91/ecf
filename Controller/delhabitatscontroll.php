<?php


// supprimer un habitat //

$id = $_POST["id"];
$name = $_POST["name"];
$description = $_POST["description"];


try {
    $pdo = new PDO('mysql:host=localhost;dbname=ecf', 'root', ''); 

    $stmt = $pdo->prepare("DELETE FROM habitats WHERE id=(:id)");
    $stmt->bindParam(":id", $id);

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