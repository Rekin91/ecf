<?php
 
 session_start();
// PARTIE POUR L'ENREGISTREMENT DE L'UTILISATEUR // 

    $role = $_POST["role"]; 
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

// PARTIE POUR L'ENVOI DE L EMAIL //

$to = "$email";
$subject = "ID DE CONNEXION ZOO ARCADIA";
$message = "Voici vos identifiant de connexion pour vous connecter a vos services 
Identifiant= ".$email." votre mot de passe vous sera transmis sur votre lieux de travail par votre superieur";
$headers = "From: zooarcadia@exemple.fr\r\n";
$headers .= "Return-Path: zooarcadia@exemple.fr\r\n"; 




    if ($role == "employe") {
        $roleid = 2;
    } elseif ($role == "veterinaire") {
        $roleid = 3;
       }
       else {
        echo "pas de role selectionner";
        exit;
       }
       

    try {
        $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi'); 

        $stmt = $pdo->prepare("INSERT INTO users (id_role, email, password) VALUES (:id_role, :email, :passwordHash)");

        $stmt->bindParam(':id_role', $roleid);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':passwordHash', $passwordHash);

        if ($stmt->execute()) {
            if(mail($to, $subject, $message, $headers)){ ;
                 $_SESSION['account'] = "L'e-mail contenant l'identifiant a été envoyé avec succès.";
        }
             else {
                $_SESSION['account'] = "L'e-mail n'a pas été envoyer, merci de réesayer";
                header("location: ../contact.php");
             }
             header("Location: ../admin.php");
             exit;
        } else {
            echo "Erreur lors de l'inscription : " . implode(", ", $stmt->errorInfo());
        }
    } catch (PDOException $e) {

        if ($e->errorInfo[1] == 1062) {
            // Erreur de clé dupliquée (contrainte UNIQUE)
            $_SESSION["unique"] = "Cet email existe déjà.";
            header("location: ../admin.php");
            exit;
    }
    }
