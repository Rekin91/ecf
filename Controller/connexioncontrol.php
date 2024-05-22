<?php


session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
try {
    $pdo = new PDO('mysql:host=mysql-ecfpromo2024.alwaysdata.net;dbname=ecfpromo2024_bddsql', '358970', 'coucoutoi');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {

        if ($user["firstlog"] == 0) {
        header("location: ../changepass.php" );
        exit;
        }
    

      elseif ($user["id_role"] == 2) {
        $_SESSION["role"] = "employe";
        header("Location: ../employe.php") ;
        exit;
      }
      elseif ($user["id_role"] == 3) {
        $_SESSION["role"] = "veterinaire";
        header("Location: ../veterinaire.php");
        exit;
      }
      elseif ($user["id_role"] == 4) {
        $_SESSION["role"] = "admin";
        header("Location: ../admin.php");
        exit;
    } 
    else {
      $_SESSION["errorlog"] = "<p>Erreur: email ou mot de passe incorrect</p>";
      header("location: ../connexion.php");
      exit();
    }
}

    else {
   
        $_SESSION["errorlog"] = "<p>Erreur: email ou mot de passe incorrect</p>";
        header("location: ../connexion.php");
        exit();
    }
    }
 catch (PDOException $e) {

    echo "Erreur de connexion : " ;//$e->getMessage();
}
}


