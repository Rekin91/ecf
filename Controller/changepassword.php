<?php
  
  if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $firstlog = 1 ;

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=ecf', 'root', ''); 

        $stmt = $pdo->prepare("UPDATE users SET password = (:password), firstlog = (:firstlog) WHERE email = (:email)");

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':firstlog', $firstlog);
        $stmt->bindParam(':password', $passwordHash);

        if ($stmt->execute()) {
        header("Location: ../connexion.php");
        exit;
        } else {
            echo "Erreur lors de la mise a jour du mot de passe : " . implode(", ", $stmt->errorInfo());
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
  }